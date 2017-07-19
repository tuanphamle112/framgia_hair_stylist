<?php

namespace App\Repositories;

use App\Contracts\Repositories\UserRepository;
use App\Eloquents\User;

class UserRepositoryEloquent extends AbstractRepositoryEloquent implements UserRepository
{
    public function model()
    {
        return new User;
    }

    public function getStylistByDepartmentId($with = [], $select = ['*'], $value)
    {
        return $this->model()->select($select)->with($with)->where('department_id', $value)->get();
    }
}
