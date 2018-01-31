<?php
	header('Content-type: text/html; charset=utf8');
	set_time_limit(0);

	function curl_redir_exec($ch) {
		static $curl_loops = 0;
		static $curl_max_loops = 2; # ћаксимальное количество перебросов.
		if ($curl_loops++ >= $curl_max_loops) {
			$curl_loops = 0;
			return FALSE;
		}
		curl_setopt($ch, CURLOPT_HEADER, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$data = curl_exec($ch);
		list($header, $data) = explode("\n\n", $data, 2);
		$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		if ($http_code == 301 || $http_code == 302) {
			$matches = array();
			preg_match('/Location:(.*?)\n/', $header, $matches);
			$url = @parse_url(trim(array_pop($matches)));
			if (!$url) {
				$curl_loops = 0;
				return $data;
			}
			$last_url = parse_url(curl_getinfo($ch, CURLINFO_EFFECTIVE_URL));
			if (!$url['scheme'])
				$url['scheme'] = $last_url['scheme'];
			if (!$url['host'])
				$url['host'] = $last_url['host'];
			if (!$url['path'])
				$url['path'] = $last_url['path'];
			$new_url = $url['scheme'] . '://' . $url['host'] . $url['path'] . ($url['query']?'?'.$url['query']:'');
			curl_setopt($ch, CURLOPT_URL, $new_url);
			return curl_redir_exec($ch);
		} else {
			$curl_loops=0;
			return $data;
		}
	}

	function parse($pgs, $pgs2, $lnk, $lnk2, $ext, $ext2, $bro, $bro2, $host) {
		$mult = curl_multi_init();

		$handles = array();
		for ($i = 0; $i < count($pgs); $i++) {
			$pgs[$i] = trim($pgs[$i]);

			$handles[$i] = curl_init();

			curl_setopt($handles[$i], CURLOPT_URL, $pgs[$i]);
			curl_setopt($handles[$i], CURLOPT_RETURNTRANSFER, true);
			curl_setopt($handles[$i], CURLOPT_CONNECTTIMEOUT, 10);

			curl_multi_add_handle($mult, $handles[$i]);
		}

		$active = null;
		do {
			$mrc = curl_multi_exec($mult, $active);
		} while ($mrc == CURLM_CALL_MULTI_PERFORM);

		while ($active && $mrc == CURLM_OK) {
			if (curl_multi_select($mult) != -1) {
				do {
					$mrc = curl_multi_exec($mult, $active);
				} while ($mrc == CURLM_CALL_MULTI_PERFORM);
			}
		}

		for ($i = 0; $i < count($pgs); $i++) {
			/* curl_redir_exec($handles[$i]); */
			$html = curl_exec($handles[$i]);
			$hc = curl_getinfo($handles[$i], CURLINFO_HTTP_CODE);

			if ($hc == "404" && !in_array($pgs[$i], $bro)) {
				$bro[] = $pgs[$i];
				$bro2[] = $pgs2[$i];
			}

			if (!empty($html)) {

				preg_match_all("/<a.*?href=(?:\"|')(.*?)(?:\"|')/is", $html, $res);

				foreach ($res[1] as $val) {

					if (strpos($val, '#') === false && strpos($val, '@') === false) {
						$path = parse_url($val);

						if (substr($path['host'], 0, 4) == 'www.')
							$path['host'] = str_replace('www.', '', $path['host']);

						if (!empty($path['host']) && $path['host'] == $host) {

							if (substr($val, 0, 7) != 'http://' && substr($val, 0, 8) != 'https://')
								$val = 'http://'.$val;

							 if (!in_array($val, $lnk))
								if (preg_match("/(?:http|https):\/\/(.*?)\.(.*?)\/(.*?)\./i", $val)) {
									if (preg_match("/(?:http|https):\/\/.*?\.(?:html|htm|php|aspx|asp)/i", $val)) {
										$lnk[] = $val;
										$lnk2[] = $pgs[$i];
									}
								} else {
									$lnk[] = $val;
									$lnk2[] = $pgs[$i];
								}

						} else if (empty($path['host'])) {

							if (strpos($val, '/') == 0 && strpos($val, '/') !== false)
								$val = $host.$val;
							else
								$val = $host.'/'.$val;

							if (substr($val, 0, 7) != 'http://' && substr($val, 0, 8) != 'https://')
								$val = 'http://'.$val;

							if (!in_array($val, $lnk))
								if (preg_match("/(?:http|https):\/\/(.*?)\.(.*?)\/(.*?)\./i", $val)) {
									if (preg_match("/(?:http|https):\/\/.*?\.(?:html|htm|php|aspx|asp)/i", $val)) {
										$lnk[] = $val;
										$lnk2[] = $pgs[$i];
									}
								} else {
									$lnk[] = $val;
									$lnk2[] = $pgs[$i];
								}

						} else if (!empty($path['host']) && $path['host'] != $host) {

							if (substr($val, 0, 7) != 'http://' && substr($val, 0, 8) != 'https://')
								$val = 'http://'.$val;

							if (!in_array($val, $ext))
								if (preg_match("/(?:http|https):\/\/(.*?)\.(.*?)\/(.*?)\./i", $val)) {
									if (preg_match("/(?:http|https):\/\/.*?\.(?:html|htm|php|aspx|asp)/i", $val)) {
										$ext[] = $val;
										$ext2[] = $pgs[$i];
									}
								} else {
									$ext[] = $val;
									$ext2[] = $pgs[$i];
								}

						}
					}

				}
			}
		}

		for ($i = 0; $i < count($handles); $i++) {
			curl_multi_remove_handle($mult, $handles[$i]);
		}

		curl_multi_close($mult);

		echo implode(",", $lnk).'|'.implode(",", $lnk2).'|'.implode(",", $ext).'|'.implode(",", $ext2).'|'.implode(",", $bro).'|'.implode(",", $bro2);
	}

	$pages = explode(",", $_POST['pages']);
	$pages2 = explode(",", $_POST['pages2']);
	$links = explode(",", $_POST['links']);
	$links2 = explode(",", $_POST['links2']);
	$external = explode(",", $_POST['external']);
	$external2 = explode(",", $_POST['external2']);
	$broken = explode(",", $_POST['broken']);
	$broken2 = explode(",", $_POST['broken2']);
	
	parse($pages, $pages2, $links, $links2, $external, $external2, $broken, $broken2, $_POST['hostname']);

?>