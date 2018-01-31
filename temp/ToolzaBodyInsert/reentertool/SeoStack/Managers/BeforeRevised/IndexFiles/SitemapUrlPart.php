<?php

class SitemapUrlPart {

    public $Loc;
    public $Lastmod;
    public $Changefreq;
    public $Priority;

    public function __toString(){
        return "<url>
		<loc>$this->Loc</loc>
		<lastmod>$this->Lastmod</lastmod>
		<changefreq>$this->Changefreq</changefreq>
		<priority>" . sprintf("%.2f", $this->Priority) . "</priority>
	    </url>";
    }
}