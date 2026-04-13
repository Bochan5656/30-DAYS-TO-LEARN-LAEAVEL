<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class PostPolicy   // ← ここを PostPolicy に
{
    public function update(User $user, Post $post): bool
    {
        Log::info('PostPolicy@update', [
            'user_id' => $user->id,
            'post_user' => $post->user_id,
        ]);

        return $post->user_id === $user->id;
    }

    public function delete(User $user, Post $post): bool
    {
        return $post->user_id === $user->id;
    }
    // public function create(User $user): bool { return true; }
    // public function viewAny(?User $user): bool { return true; }
    // public function view(?User $user, Post $post): bool { return true; }
}
