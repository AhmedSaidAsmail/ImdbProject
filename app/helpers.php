<?php
use App\Src\Imdb\ImdbFactory;

if (!function_exists('getRate')) {
    function getRate($id)
    {
        $imdb = new ImdbFactory($id, 'rate');
        return $imdb->getResult();
    }
}
if (!function_exists('getThumb')) {
    function getThumb($img)
    {
        $img = preg_replace('/_V1_.*?.jpg/ms', "_V1._SY50.jpg", $img);
        $img=preg_replace('/https/ms','http',$img);
        return $img;
    }
}