<?php


namespace Core;

use Core\Helper;

class Content
{
    public $dir_list = array();
    public static $file_list = array();
    public $content_dir;
    public $page_header;
    public $page_body;
    private $helper ;
    public function __construct ($path)
    {
        $this->content_dir = $path;
        $this->helper = new \Core\Helper();
    }

    public function getDirList($path)
    {
        foreach(glob($path . '/*') as $dir) {
            if (
                ($dir)) {
                $this->dir_list[] = basename($dir);
            }
        }
        return $this->dir_list;
    }

    public static function getFileList($path)
    {
        foreach(glob($path . '/*') as $dir) {
            if (is_file($dir)) {
                self::$file_list[] = basename($dir);
            }
        }
        return self::$file_list;
    }

    public function getContent($path)
    {
        $page = $this->helper->parseFile ($this->content_dir.$path);
        $this->page_header =(array) json_decode ($page[0]);
        $this->page_body = $page[1];
    }

}