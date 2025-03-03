<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\About;
use App\Models\Category;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        Role::factory()->create();
        Role::factory()->create(['name' => 'member']);

        About::factory()->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123'),
        ]);


        $categories = ['Berita', 'Olahraga', 'Politik', 'Hiburan', 'Kesehatan', 'Kultural'];
        foreach ($categories as $category) {
            Category::factory()->create([
                'name' => $category
            ]);
        }

        $user = User::first();
        for ($i = 0; $i < 10; $i++) {
            Post::factory()->create([
                'user_id' => $user->id
            ]);
        }
    }
}
