<?php

namespace App\Controller;

use App\Repository\TaskRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TaskController extends AbstractController
{
    private $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository=$taskRepository;
    }

    public function index()
    {
        $tasks = $this->taskRepository->findAll();
        return $this->render('task/index.html.twig', [
            "tasks" => $tasks
        ]);
    }

    /**
     * @Route("/task/{id}",name="task_show")
     */
    public function showTask($id)
    {
        $task = $this->taskRepository->find($id);

        if (!$task) {
            throw $this->createNotFoundException(
                'No task found for id '.$id
            );
        }

        return $this->render('task/show.html.twig', [
            "task" => $task
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
