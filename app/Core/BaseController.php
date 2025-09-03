<?php

namespace App\Core;

class BaseController
{
    public function render($view, $data = [])
    {
        extract($data); // data değişkeninin anahtarları değişken olarak çıkarılır ve kullanılabilir hale getirilir.
        require __DIR__ . "/../../views/layouts/header.php";
        require __DIR__ . "/../../views/$view.php";
        require __DIR__ . "/../../views/layouts/footer.php";
    }
}

?>