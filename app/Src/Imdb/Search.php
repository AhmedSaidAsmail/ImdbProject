<?php
namespace App\Src\Imdb;

use Exception;

class Search extends AbstractImdb implements ImdbInterface
{
    private static $url = "http://lab.abhinayrathore.com/imdb_suggest/suggest.php?term=";
    private $keyword;

    public function __construct($keyword)
    {
        $this->keyword = $keyword;
    }
    private function prepareUrl(){
        $term = trim(strtolower($this->keyword));
        $search = str_replace(array(" ", "(", ")"), array("_", "", ""), $term); //format search term
        $firstChar = substr($search, 0, 1); //get first character
        $url = "http://sg.media-imdb.com/suggests/$firstChar/$search.json";
        return $url;
    }

    public function getContent()
    {
        $html = $this->getUrl($this->prepareUrl()); //get JSONP data
        preg_match('/^imdb\$.*?\((.*?)\)$/ms', $html, $matches); //convert JSONP to JSON
        $json = $matches[1];
        return json_decode($json, true);

    }


}