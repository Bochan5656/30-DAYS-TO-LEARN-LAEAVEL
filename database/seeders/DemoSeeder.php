<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;

class DemoSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::factory()->create([
            'name'     => 'Demo User',
            'email'    => 'demo@example.com',
            'password' => bcrypt('password'),
        ]);

        // 既存ユーザーに紐づけて5件作成
        Post::factory()->count(5)->for($user)->create();
    }
}
