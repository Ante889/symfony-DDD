<?php

declare(strict_types=1);

namespace App\TaskTable\Task\Application\Controller\Api\v1;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route(
    path:'/task/create',
    name: 'task_create_v1',
    methods: ['GET']
)]
final class CreateTaskController
{
    public function __construct(
    )
    {
    }

    public function __invoke(Request $request): JsonResponse
    {
        dd($request->get('test'));
        return new JsonResponse([
        ]);
    }
}