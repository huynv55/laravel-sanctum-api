<?php
namespace App\Repositories;

use App\Models\User;

class UserRepository extends EloquentRepository
{
    public function getModel() : string
    {
        return User::class;
    }

    public function findByName(string $name) : ?User
    {
        return $this->_model->where(['name' => $name])->firstOrFail();
    }
}

?>