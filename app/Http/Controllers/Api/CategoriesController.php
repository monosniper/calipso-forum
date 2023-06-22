<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        return response()->json(Category::create($request->only(['title'])));
    }
}
