<?php

namespace App\Repositories;

use App\Models\Post;

interface ICommentRepository
{
    public function all(int $postId);

    public function findById(int $postId, int $commentId);

    public function create(int $postId, array $params);

    public function update(int $postId, int $commentId, array $params);

    public function destroy(int $postId, int $commentId);
}
