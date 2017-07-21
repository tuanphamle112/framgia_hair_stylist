<?php

namespace App\Repositories;

use App\Contracts\Repositories\CommentRepository;
use App\Eloquents\Comment;

class CommentRepositoryEloquent extends AbstractRepositoryEloquent implements CommentRepository
{
    public function model()
    {
        return new Comment;
    }
}
