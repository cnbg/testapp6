<?php

namespace App\Repositories\Eloquent;

use App\Models\Comment;
use App\Repositories\ICommentRepository;
use App\Repositories\IPostRepository;
use Illuminate\Database\Eloquent\Collection;

class CommentRepository implements ICommentRepository
{
    private IPostRepository $posts;

    public function __construct(IPostRepository $posts)
    {
        $this->posts = $posts;
    }

    public function all(int $postId): Collection
    {
        return Comment::with('author:id,name')
                      ->where('post_id', $postId)
                      ->get();
    }

    public function findById(int $postId, int $commentId): object|null
    {
        return Comment::with('author:id,name')
                      ->where('id', $commentId)
                      ->where('post_id', $postId)
                      ->first();
    }

    public function create(int $postId, array $params): Comment|null
    {
        $post = $this->posts->findById($postId);

        return $post?->comments()?->create($params);
    }

    public function update(int $postId, int $commentId, array $params): Comment|null
    {
        $comment = Comment::where('id', $commentId)
                          ->where('post_id', $postId)
                          ->first();

        $comment?->update($params);

        return $comment;
    }

    public function destroy(int $postId, int $commentId): int
    {
        return Comment::where('post_id', $postId)
                      ->where('id', $commentId)
                      ->delete();
    }
}
