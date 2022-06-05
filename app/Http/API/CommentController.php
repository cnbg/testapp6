<?php

namespace App\Http\API;

use App\Http\Requests\ComentCreateRequest;
use App\Http\Requests\CommentUpdateRequest;
use App\Repositories\ICommentRepository;

class CommentController extends Controller
{
    private ICommentRepository $comments;

    public function __construct(ICommentRepository $comments)
    {
        $this->comments = $comments;
    }

    public function index(int $postId)
    {
        return $this->comments->all($postId);
    }

    public function show(int $postId, int $commentId)
    {
        return $this->comments->findById($postId, $commentId);
    }

    public function store(ComentCreateRequest $request, int $postId)
    {
        $params = $request->only('content');

        return $this->comments->create($postId, $params);
    }

    public function update(CommentUpdateRequest $request, int $postId, int $commentId)
    {
        $params = $request->only('content');

        return $this->comments->update($postId, $commentId, $params);
    }

    public function destroy(int $postId, int $commentId)
    {
        return $this->comments->destroy($postId, $commentId);
    }
}
