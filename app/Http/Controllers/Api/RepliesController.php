<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Reply;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RepliesController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        return response()->json(Reply::create([
            ...$request->only([
                'content',
                'post_id',
                'created_at',
            ]),
            'user_id' => User::inRandomOrder()->first()->id
        ]));
    }
}
