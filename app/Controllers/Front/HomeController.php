<?php

namespace App\Controllers\Front;
use App\Core\BaseController;


class HomeController extends BaseController
{
    public function index()
    {
        $title = "Ana Sayfa";
        $content = "Hoş geldiniz! Bu Web Sitesi MVC ve OOP prensipleri ile geliştirilmiştir ! Bu bir DEMO sürümdür ve girdiğiniz <br> veriler kısa süre sonra silinecektir ! <br>İletişime geçmek için lütfen <a target='_blank' href='https://esatyucel.com'>Web Sitemi</a> ziyaret edin.";
        $this->render("front/home", ["title" => $title, "content" => $content]);

        
    }
}

