<?php
namespace App\Src\Imdb;

class ImdbFactory
{
    private $class;

    public function __construct($keyword, $type = "list")
    {
        $this->setClass($keyword, $type);

    }

    private function setClass($keyword, $type)
    {
        switch ($type) {
            case "list":
                $this->class = new Search($keyword);
                break;
            case "rate":
                $this->class = new GetRate($keyword);

        }

    }

    public function getResult()
    {
        return $this->class->getContent();
    }


}