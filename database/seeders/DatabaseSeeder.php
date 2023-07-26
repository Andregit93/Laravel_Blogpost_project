<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // // User Factory
        // \App\Models\User::factory()->create([
        //         'name' => 'Test User',
        //         'email' => 'test@example.com',
        //     ]);

        User::create([
            'name' => 'name',
            'username' => 'username',
            'email' => 'name@gmail.com',
            'password' => bcrypt('password')
        ]);


        // // User and Post factory
        // User::factory(3)->create();
        // Post::factory(30)->create();

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);

        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ex totam omnis soluta? Autem quam voluptate laborum voluptatum tempore accusamus odio',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ex totam omnis soluta? Autem quam voluptate laborum voluptatum tempore accusamus odio, dolores nobis veritatis optio tempora facilis. Amet, placeat? Deleniti quae vero natus aut saepe temporibus! Consequatur, amet possimus at sapiente, rerum nemo numquam expedita laudantium nobis adipisci qui repellendus corporis excepturi exercitationem officiis sequi! Eius nam nisi esse, tenetur maiores distinctio libero quis quae corrupti odio nobis impedit sint ducimus necessitatibus reprehenderit qui voluptatibus earum culpa facilis debitis! Sit, velit dicta minima, obcaecati ut id possimus repellat recusandae optio explicabo iste, molestiae excepturi amet! Consequatur autem totam inventore pariatur quisquam?',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Ke Dua',
        //     'slug' => 'judul-ke-dua',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ex totam omnis soluta? Autem quam voluptate laborum voluptatum tempore accusamus odio',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ex totam omnis soluta? Autem quam voluptate laborum voluptatum tempore accusamus odio, dolores nobis veritatis optio tempora facilis. Amet, placeat? Deleniti quae vero natus aut saepe temporibus! Consequatur, amet possimus at sapiente, rerum nemo numquam expedita laudantium nobis adipisci qui repellendus corporis excepturi exercitationem officiis sequi! Eius nam nisi esse, tenetur maiores distinctio libero quis quae corrupti odio nobis impedit sint ducimus necessitatibus reprehenderit qui voluptatibus earum culpa facilis debitis! Sit, velit dicta minima, obcaecati ut id possimus repellat recusandae optio explicabo iste, molestiae excepturi amet! Consequatur autem totam inventore pariatur quisquam?',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Ke Tiga',
        //     'slug' => 'judul-ke-tiga',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ex totam omnis soluta? Autem quam voluptate laborum voluptatum tempore accusamus odio',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ex totam omnis soluta? Autem quam voluptate laborum voluptatum tempore accusamus odio, dolores nobis veritatis optio tempora facilis. Amet, placeat? Deleniti quae vero natus aut saepe temporibus! Consequatur, amet possimus at sapiente, rerum nemo numquam expedita laudantium nobis adipisci qui repellendus corporis excepturi exercitationem officiis sequi! Eius nam nisi esse, tenetur maiores distinctio libero quis quae corrupti odio nobis impedit sint ducimus necessitatibus reprehenderit qui voluptatibus earum culpa facilis debitis! Sit, velit dicta minima, obcaecati ut id possimus repellat recusandae optio explicabo iste, molestiae excepturi amet! Consequatur autem totam inventore pariatur quisquam?',
        //     'category_id' => 2,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Ke Empat',
        //     'slug' => 'judul-ke-empat',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ex totam omnis soluta? Autem quam voluptate laborum voluptatum tempore accusamus odio',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ex totam omnis soluta? Autem quam voluptate laborum voluptatum tempore accusamus odio, dolores nobis veritatis optio tempora facilis. Amet, placeat? Deleniti quae vero natus aut saepe temporibus! Consequatur, amet possimus at sapiente, rerum nemo numquam expedita laudantium nobis adipisci qui repellendus corporis excepturi exercitationem officiis sequi! Eius nam nisi esse, tenetur maiores distinctio libero quis quae corrupti odio nobis impedit sint ducimus necessitatibus reprehenderit qui voluptatibus earum culpa facilis debitis! Sit, velit dicta minima, obcaecati ut id possimus repellat recusandae optio explicabo iste, molestiae excepturi amet! Consequatur autem totam inventore pariatur quisquam?',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);

    }
}
