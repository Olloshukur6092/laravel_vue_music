<?php

namespace App\Services;

use App\Models\Comment;

class CommentsServices
{
    protected $commentModel;
    public function __construct(Comment $comment)
    {
        $this->commentModel = $comment->query();
    }

    // this method Comment Model data get
    public function commentIndexService()
    {
        return $this->commentModel->with('user')->where(['status' => '1'])->get();
    }

    //this method Saved Comment model data
    public function commentStoreService($title, $description, $userId): void
    {
        $this->commentModel->create([
            'title' => $title,
            'description' => $description,
            'user_id' => $userId
        ]);
    }
}
