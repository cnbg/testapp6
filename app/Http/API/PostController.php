<?php

namespace App\Http\API;

use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Repositories\IPostRepository;

class PostController extends Controller
{
    private IPostRepository $posts;

    public function __construct(IPostRepository $posts)
    {
        $this->posts = $posts;
    }

    public function index()
    {
        return $this->posts->all();
    }

    public function show(int $postId)
    {
        return $this->posts->findById($postId);
    }

    public function store(PostCreateRequest $request)
    {
        $params = $request->only('title', 'link', 'content');

        return $this->posts->create($params);
    }

    public function update(PostUpdateRequest $request, int $postId)
    {
        $params = $request->only('title', 'link', 'content');

        return $this->posts->update($postId, $params);
    }

    public function upvote(int $postId)
    {
        return $this->posts->upvote($postId);
    }

    public function destroy(int $postId)
    {
        return $this->posts->destroy($postId);
    }
}
