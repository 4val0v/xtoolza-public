<?php

/**
 * Class JsonSimple
 */
class JsonSimple implements IJson{

    public function fromJSON ( $strJson, $assoc = false ) {

      $markerToDoubleSlash = "^~ds~^";
      //$matchString = '#".*?(?<!\\\\)"#';
      //$matchString = '#".*?"#';
      //$matchString = '#".*?(?<!(?<!(?<!\\\\)\\\\)\\\\)"#';
      $matchString = '#".*?(?<!\\\\)"#';

      $strJson = str_replace("\\\\", $markerToDoubleSlash, $strJson);
      $t = preg_replace( $matchString, '', $strJson );
      $t = preg_replace( '/[,:{}\[\]0-9.\-+Eaeflnr-u \n\r\t]/', '', $t );

      if ($t != '') { return null; }

      $s2m = array();
      $m2s = array();
      preg_match_all( $matchString, $strJson, $m );

      foreach ($m[0] as $s) {
        $hash       = '"' . md5( $s ) . '"';
        $s2m[$s]    = $hash;
        $m2s[$hash] = str_replace( '$', '\$', $s );
      }

      $strJson = strtr( $strJson, $s2m );

      $a = ($assoc) ? '' : '(object) ';
      $strJson = strtr( $strJson,
        array(
          ':' => '=>',
          '[' => 'array(',
          '{' => "{$a}array(",
          ']' => ')',
          '}' => ')'
        )
      );

      $strJson = preg_replace( '~([\s\(,>])(-?)0~', '$1$2', $strJson );
      $strJson = strtr( $strJson, $m2s );

      $strJson = str_replace($markerToDoubleSlash, "\\\\",  $strJson);
      $f = @create_function( '', "return {$strJson};" );
      $r = ($f) ? $f() : null;

      unset( $s2m ); unset( $m2s ); unset( $f );

      return $r;
    }

    public function toJSON ( $obj ) {

      if ($obj === null) { return 'null'; };

      $out = '';
      $esc = "\"\\/\n\r\t" . chr( 8 ) . chr( 12 );
      $l   = '.';

      switch ( gettype( $obj ) )
      {
        case 'boolean':
          $out .= $obj ? 'true' : 'false';
          break;

        case 'float':
        case 'double':
          $l = localeconv();
          $l = $l['decimal_point'];

        case 'integer':
          $out .= str_replace( $l, '.', $obj );
          break;

        case 'array':
          for ($i = 0; ($i < count( $obj ) && isset( $obj[$i]) ); $i++);
          if ($i === count($obj)) {
            $out .= '[' . implode(',', array_map('toJSON', $obj)) . ']';
            break;
          }

        case 'object':
          $arr = is_object($obj) ? get_object_vars($obj) : $obj;
          $b = array();
          foreach ($arr as $k => $v) {
            $b[] = '"' . addcslashes($k, $esc) . '":' . toJSON($v);
          }
          $out .= '{' . implode( ',', $b ) . '}';
          break;

        default:
          return '"' . addcslashes($obj, $esc) . '"';
          break;
      }
      return $out;
    }
}

?>