<?php


namespace Core;


class App
{
    public $uri = array();
    public $category_list = array();

    public function __construct ($uri, $category_list)
    {
       $this->uri = $uri;
       $this->category_list = $category_list;
    }

    public function searchCategory($category)
    {
        if (in_array ($category ,$this->category_list))
        {
            return $category;
        }else{
            return false;
        }
    }

    public function  searchFile ($filename,$dir)
    {
        $file_list = Content::getFileList (ABSPATH.$dir);
        if (in_array ($filename ,$file_list))
        {
            return $filename;
        }else{
            return false;
        }
    }

    public function main()
    {
       if (empty($this->uri) or $this->uri[0] == '' or count ($this->uri) < 2)
       {
           return 'home.md';

       }elseif (count ($this->uri) >= 2)
       {
           $category = $this->searchCategory ($this->uri[0]);

           if ($category != false)
           {
               //echo 'Категория - '.$category;
               $file = $this->searchFile ($this->uri[1],$category);
               if ($file != false){
               echo ABSPATH.'/'.$category.'/'.$file;

               }else{
                   echo "404 Страница не найдена";
               }
           }

       }
    }
}