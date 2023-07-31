<?php

declare(strict_types=1);

namespace App\TaskTable\Task\Application\Controller\Api\v1;

use App\TaskTable\Task\Application\ReadModel\Query\TaskQuery;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route(
    path:'/task/list',
    name: 'task_list_v1',
    methods: ['GET']
)]
class TaskController
{
    public function __construct(
    )
    {
    }

    public function __invoke(
        Request $request,
        TaskQuery $query
    ): JsonResponse
    {
        return new JsonResponse(
            $query->fetchAll()
        );
    }
}