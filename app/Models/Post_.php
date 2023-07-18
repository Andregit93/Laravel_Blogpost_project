<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;

class Post 
{
    private static $blog_posts = [
        [
            "title" => "Post Pertama Andre",
            "slug" => "post-pertama",
            "author" => "Andre Sevtian",
            "body" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eius placeat impedit consequuntur dignissimos quas deserunt culpa ullam eveniet porro numquam, temporibus exercitationem eligendi voluptas at quia odit ab molestias saepe, magni repudiandae corrupti atque quasi asperiores. Nam, sunt adipisci quo corporis placeat commodi doloribus iure quis laborum necessitatibus voluptatem iste eligendi sit ex sequi accusantium tempora sapiente nihil totam nobis. Sint nostrum quae corporis sequi voluptates nisi illum! Praesentium iste sunt dolorum commodi porro earum officiis nisi sapiente, inventore eveniet?"
        ],
        [
            "title" => "Post Kedua",
            "slug" => "post-kedua",
            "author" => "arga sevtian",
            "body" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eius placeat impedit consequuntur dignissimos quas deserunt culpa ullam eveniet porro numquam, temporibus exercitationem eligendi voluptas at quia odit ab molestias saepe, magni repudiandae corrupti atque quasi asperiores. Nam, sunt adipisci quo corporis placeat commodi doloribus iure quis laborum necessitatibus voluptatem iste eligendi sit ex sequi accusantium tempora sapiente nihil totam nobis. Sint nostrum quae corporis sequi voluptates nisi illum! Praesentium iste sunt dolorum commodi porro earum officiis nisi sapiente, inventore eveniet tempora sapiente nihil totam nobis. Sint nostrum quae corporis sequi voluptates nisi illum! Praesentium iste sunt dolorum commodi porro earum officiis nisi sapiente, inventore eveniet?"
        ]
    ];

    static function all() 
    {
        return collect(self::$blog_posts);
    }

    static function find($slug)
    {
        $posts = static::all();
        return $posts->firstWhere('slug', $slug);
    }
}
