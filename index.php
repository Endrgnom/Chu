<?php 

session_start();

  // загрузка автозагрузчика
  require_once __DIR__.'/vendor/autoload.php';

   @define('ABSPATH', str_replace('\\', '/', dirname(__FILE__)));

$helper = new \Core\Helper();
$content_dir = ABSPATH.'/content';


  // место где будут хранятся шаблоны Twig

$loader = new \Twig\Loader\FilesystemLoader(ABSPATH.'/Template/front-end');
  // инициализация самого движка
   $twig = new \Twig\Environment($loader,['debug' => true]);

// $staff = [
//     [   'name'    => 'Андрей',
//         'description'   => 'Физика',
//         'age'           =>  29,
//         'date_register' => '2017-06-23',
//     ],
//     [
//         'name'          => 'Татьяна',
//         'description'   => 'Химия',
//         'age'           =>  25,
//         'date_register' => '2017-06-22',
//     ],
//     [
//         'name'          => 'Наталья',
//         'description'   => 'Алгебра',
//         'age'           =>  27,
//         'date_register' => '2017-10-25',
//     ],
// ];
$title = 'Chewbacca Blog ';

// вывод данных на страницу
// echo $twig->render('main.html', ['staff' => $staff] );

echo $twig->render('main.html',['title'=> $title]);



 ?>