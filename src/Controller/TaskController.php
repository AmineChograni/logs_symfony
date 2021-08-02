<?php

namespace App\Controller;

use App\Repository\TaskRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Task;
use App\Form\TaskType;
use Symfony\Component\HttpFoundation\Request;

class TaskController extends AbstractController
{
    private $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository=$taskRepository;
    }

    /**
     * @Route("/",name="task_list")
     */
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
     * @Route("/create/task",name="task_create")
     */
    public function createTask()
    {
        $task = new Task();
        // ...

        $form = $this->createForm(TaskType::class, $task);

        if($form->isSubmitted() && $form->isValid()){

        }

        return $this->render('task/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

}
