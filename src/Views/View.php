<?php

namespace App\Views;


class View 
{
    public function __construct($view, $data = null)
    {
        require_once("src/Views/$view.php");
    }
}