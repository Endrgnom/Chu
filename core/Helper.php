<?php


namespace Core;


class Helper
{
    public function GetURI()
    {
        return $_SERVER['REQUEST_URI'];
    }

    public function ParseURI($uri)
    {
        $uri = trim ($uri,'/');
        $uri = explode ("/",$uri);
        return $uri;
    }

    public function getFileContent($path)
    {
        return file_get_contents ($path);
    }

    public function parseFile($path)
    {
        $content = explode ( '===', $this->getFileContent ($path));
        return $content;
    }
}