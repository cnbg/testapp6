<?php

namespace App\Repositories\Eloquent;

use App\Models\Post;
use App\Repositories\IPostRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class PostRepository implements IPostRepository
{
    public function all(): Collection
    {
        return Post::with('author:id,name')->get();
    }

    public function findById(int $postId): object|null
    {
        return Post::with('author:id,name')->where('id', $postId)->first();
    }

    public function create(array $params): Post|null
    {
        return Post::create($params);
    }

    public function update(int $postId, array $params): Post|null
    {
        $post = Post::find($postId);

        $post?->update($params);

        return $post;
    }

    public function upvote(int $postId): int
    {
        return Post::query()
                   ->where('id', $postId)
                   ->update(['upvote' => DB::raw('upvote + 1')]);
    }

    public function destroy(int $postId): int
    {
        return Post::destroy($postId);
    }
}
