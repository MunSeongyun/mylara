<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TaskService;

class TaskController extends Controller
{
    public function getTasks(Request $request, TaskService $service)
    {
        $isDone = $request->get('is_done');
        
        $tasks = $service->findTasks($isDone);
        
        return response($tasks);
    }
}