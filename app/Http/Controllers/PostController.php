<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in Category ' . $category->name;
        }
        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }

        // API request
        // $endPoint = 'https://api.unsplash.com/photos/random/?client_id=AQ5rwq6065kVX5pChqMaTU66G2GCVrGc1RwXa8-N8hw';
        // $images = file_get_contents($endPoint);
        // $data = json_decode($images, true);

        return view('blog', [
            "title" => "All Post" . $title,
            // "posts" => Post::all(),
            "posts" => Post::latest()->Filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        return view('post', [
            "title" => "Post",
            "post" => $post,
        ]);
    }
}
