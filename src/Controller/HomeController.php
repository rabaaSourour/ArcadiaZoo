<?php

namespace App\Controller;

class HomeController
{
    public function view() : array
    {
        $variables = [];

        return ['page' => 'home', 'variables' => $variables];
    }
}
