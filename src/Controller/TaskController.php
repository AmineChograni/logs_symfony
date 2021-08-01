<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TaskController extends AbstractController
{
    public function index()
    {
        $tasks = [
            [
                "id" => 1,
                "title" => "math home work",
                "description" => "math equations to complete"
            ],
            [
                "id" => 2,
                "title" => "science home work",
                "description" => "some thing equations to complete"
            ],
            [
                "id" => 3,
                "title" => "francais home work",
                "description" => "blah blah  equations to complete"
            ]
        ];
        return $this->render('task/index.html.twig', [
            "tasks" => $tasks
        ]);
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
