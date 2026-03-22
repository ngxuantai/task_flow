<?php

namespace App\Contracts;

interface UserRepositoryInterface
{
    /**
     * Find user by email
     */
    public function findByEmail(string $email);

    /**
     * Create a new user
     */
    public function create(array $data);

    /**
     * Find user by ID
     */
    public function findById(int $id);

    /**
     * Update user
     */
    public function update(int $id, array $data);

    /**
     * Delete user
     */
    public function delete(int $id);

    /**
     * Get all users
     */
    public function getAll();
}
