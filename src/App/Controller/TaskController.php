<?php

namespace App\Controller;

use App\TaskTable\Task\Application\UseCase\GetTask;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class TaskController extends AbstractController
{

    public function __construct(
        private readonly GetTask $getTask
    )
    {
    }

    #[Route(
        path:'/task/list',
        name: 'task_list_v1',
        methods: ['GET']
    )]
    public function getTasks(): JsonResponse
    {
        return new JsonResponse(
            $this->getTask->fetchAll()
        );
    }

    #[Route(
        path:'/task/getByTime',
        name: 'task_get_by_time_v1',
        methods: ['GET']
    )]
    public function getTaskByTime(
        Request $request
    ): JsonResponse
    {
        return new JsonResponse(
            $this->getTask->getByTime($request->get('time'))
        );
    }

//    #[Route(
//        path:'/task/create',
//        name: 'task_create_v1',
//        methods: ['GET']
//    )]
//    public function create(
//        Request $request,
//        TaskDTO $taskDTO
//    ): int
//    {
//        $this->createTask->create(
//            $taskDTO->create(
//                $request->get('description'),
//                $request->get('categoryName'),
//                $request->get('date'),
//                $request->get('length')
//            )
//        );
//
//        return Response::HTTP_CREATED;
//    }
}