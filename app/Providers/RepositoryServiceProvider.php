<?php

namespace App\Providers;

use App\Repositories\Eloquent\CommentRepository;
use App\Repositories\Eloquent\PostRepository;
use App\Repositories\ICommentRepository;
use App\Repositories\IPostRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IPostRepository::class, PostRepository::class);
        $this->app->bind(ICommentRepository::class, CommentRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
