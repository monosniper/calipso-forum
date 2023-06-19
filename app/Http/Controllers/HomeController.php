<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use App\Models\Reply;
use App\Models\Thread;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {
        return view('home', ['categories' => Category::all()->load(['threads' => function($builder) {
            $builder->withCount('posts')->with('posts');
        }])]);
    }

    public function user(User $user) {
        return view('user', ['user' => $user]);
    }

    public function guaranties() {
        return view('guaranties');
    }

    public function reply(Request $request) {
        Reply::create($request->all());

        return back();
    }

    public function thread(Thread $thread) {
        return view('thread', ['thread' => $thread->with('category')->first(), 'posts' => $thread->posts()->withCount('replies')->paginate(15)]);
    }

    public function post(Post $post) {
        $post->increment('views');
        $replies = $post->replies();

        return view('post', ['post' => $post->load(['author' => function($builder) {
            $builder->withCount('posts')->withSum('posts', 'views');
        }]), 'replies' => $replies->with(['author' => function($builder) {
            $builder->withCount('posts')->withSum('posts', 'views');
        }])->paginate(10)]);
    }

    public function posts(Request $request) {
        $posts = Post::query();

        if($request->where === 'any') {
            $posts->where('title', 'like', "%".$request->q."%")
                ->orWhereHas('thread', function($query) use($request) {
                $query->where('description', 'like', "%".$request->q."%");
            });
        } else if($request->where === 'title') {
            $posts->where('title', 'like', "%".$request->q."%");
        } else if($request->where === 'description') {
            $posts->whereHas('thread', function($query) use($request) {
                $query->where('description', 'like', "%".$request->q."%");
            });
        }

        return view('posts', ['posts' => $posts->latest()->paginate(15)]);
    }

    public function shop(Request $request) {
        return view('shop', ['products' => Product::where('title', 'like', "%".$request->q."%")->paginate(12)]);
    }

    public function product(Product $product) {
        return view('product', ['product' => $product]);
    }

    public function buy(Product $product) {
        $user = Auth::user();
        if($user->balance <= $product->price) return back()->with('flash', 'Not enough balance');

        $user->update(['balance' => $user->balance - $product->price]);
        Transaction::create([
            'type' => Transaction::PURCHASE_TYPE,
            'amount' => $product->price,
            'user_id' => $user->id,
        ]);

        return redirect()->route('profile.wallet')->with('flash', 'Successfull purchase');
    }
}