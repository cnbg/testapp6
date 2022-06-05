<?php

namespace App\Repositories;

interface IPostRepository
{
    public function all();

    public function findById(int $postId);

    public function create(array $params);

    public function update(int $postId, array $params);

    public function upvote(int $postId);

    public function destroy(int $postId);
}
