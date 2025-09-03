<?php 

require __DIR__ . "/../vendor/autoload.php";

use App\Core\Route;

Route::add('/','Front\HomeController@index');

Route::add('example','Front\ExampleController@index');

Route::add('tasks','Front\TaskController@index');

Route::add('tasks/create','Front\TaskController@create');

Route::add('tasks/edit/([0-9]+)','Front\TaskController@update');
//Route Oluşturma
Route::add('tasks/delete/([0-9]+)','Front\TaskController@delete');

$uri=trim(parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH),'/');

if ($uri === '') {
    $uri = '/';
}

Route::dispatch($uri);
?>