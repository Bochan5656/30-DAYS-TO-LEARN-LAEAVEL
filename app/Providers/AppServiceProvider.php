<?php

namespace App\Providers;

use App\Models\Post;
use App\Policies\PostPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    // ここは残してOK（あってもなくても可）
    protected $policies = [
        Post::class => PostPolicy::class,
    ];

    public function boot(): void
    {
        // ← 明示的にポリシーを紐づけ（これが決定打）
        Gate::policy(Post::class, PostPolicy::class);
    }
}
