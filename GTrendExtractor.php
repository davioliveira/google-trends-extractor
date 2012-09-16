<?php

class GTrendExtractor
{
    protected $rssUrl;

    public function __construct($rssUrl)
    {
        $this->rssUrl = $rssUrl;
    }

    public function get($format = null)
    {
        $trends = array();
        $matches = array();

        $feed = file_get_contents($this->rssUrl);

        $trends['updated'] = null;
        if (preg_match('|<updated>(.+)</updated>|', $feed, $matches)) {
            $trends['updated'] = $matches[1];
        }

        foreach (preg_split('/<li>/', $feed) as $i => $list)
        {
            $matches = array();
            if (preg_match('|<a href="([^"]+)">(.+)</a></span></li>|', $list, $matches))
            {
                $trends['trend'][$i] = array('word' => $matches[2], 'url' => $matches[1]);
            }
        }

        return $format == 'json' ? json_encode($trends) : $trends;
    }
}
