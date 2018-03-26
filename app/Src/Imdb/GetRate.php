<?php
namespace App\Src\Imdb;


class GetRate extends AbstractImdb implements ImdbInterface
{
    private static $url = "http://www.imdb.com/title/";
    private $keyword;

    public function __construct($keyword)
    {
        $this->keyword = $keyword;
    }

    public function getContent()
    {
        $url = self::$url . $this->keyword."/";
        return $this->match('/<span class="rating">(\d.\d)<span class="ofTen">\/10<\/span><\/span>/ms', $this->getUrl($url), 1);
    }
}