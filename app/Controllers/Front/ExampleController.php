<?php

namespace App\Controllers\Front;
use App\Core\BaseController;

class ExampleController extends BaseController
{
    public function index()
    {
        $title = "Example";
        $content = "Hoş geldiniz!";
        $this->render("front/example", ["title" => $title, "content" => $content]);
    }
}

?>