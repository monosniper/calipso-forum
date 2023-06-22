<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Thread;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ThreadsController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        return response()->json(Thread::create($request->only([
            'title',
            'description',
            'category_id',
        ])));
    }
}
