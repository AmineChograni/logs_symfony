<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TaskController
{
    public function index(): Response
    {


        return new Response(
            'hello symfony'
        );
    }
}
