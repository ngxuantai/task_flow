<?php

namespace App\Repositories;

use App\Contracts\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    /**
     * Find user by email
     */
    public function findByEmail(string $email)
    {
        return $this->model->where('email', $email)->first();
    }

    /**
     * Create a new user
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * Find user by ID
     */
    public function findById(int $id)
    {
        return $this->model->find($id);
    }

    /**
     * Update user
     */
    public function update(int $id, array $data)
    {
        $user = $this->findById($id);
        if ($user) {
            $user->update($data);
            return $user;
        }
        return null;
    }

    /**
     * Delete user
     */
    public function delete(int $id)
    {
        $user = $this->findById($id);
        if ($user) {
            return $user->delete();
        }
        return false;
    }

    /**
     * Get all users
     */
    public function getAll()
    {
        return $this->model->all();
    }
}
