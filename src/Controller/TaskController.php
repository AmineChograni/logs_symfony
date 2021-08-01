<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TaskController extends AbstractController
{
    public function index()
    {
        return $this->render('task/index.html.twig');
    }

    /**
     * @Route("/task/create")
     */
    public function createTask(): Response
    {
        return new Response(
            'hello from create task'
        );
    }
}
