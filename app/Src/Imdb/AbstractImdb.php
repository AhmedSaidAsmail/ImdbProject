<?php
namespace App\Src\Imdb;


abstract class AbstractImdb
{
    protected function  getUrl($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        $ip = rand(0, 255) . '.' . rand(0, 255) . '.' . rand(0, 255) . '.' . rand(0, 255);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("REMOTE_ADDR: $ip", "HTTP_X_FORWARDED_FOR: $ip"));
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/" . rand(3, 5) . "." . rand(0, 3) . " (Windows NT " . rand(3, 5) . "." . rand(0, 2) . "; rv:2.0.1) Gecko/20100101 Firefox/" . rand(3, 5) . ".0.1");
        $html = curl_exec($ch);
        curl_close($ch);
        return $html;
    }
    protected function match($regex, $str, $i = 0){
        if(preg_match($regex, $str, $match) == 1)
            return $match[$i];
        else
            return false;
    }

}