<?php

namespace app\core;

class Request
{

    public function getPath()
    {
        $fullPatch = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($fullPatch, '?');

        if(!$position){
            return $fullPatch;
        } else {
            $query = substr($fullPatch, $position);
            return str_replace($query, '', $fullPatch);
        }
    }

    public function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }


}