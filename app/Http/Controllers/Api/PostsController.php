<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Thread;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        return response()->json(Post::create([
            ...$request->only([
                'title',
                'content',
                'thread_id',
                'status',
                'views',
                'created_at',
            ]),
            'user_id' => User::inRandomOrder()->first()->id
        ]));
    }
}
