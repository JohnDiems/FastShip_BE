<?php


namespace App\Interface\Repositories;


interface UserRepositoryInterface
{
    public function findMany(object $payload, string $sortField, string $sortOrder);
    public function findByEmail(string $email);
    public function findById(int $id);
    public function findByUuid(string $uuid);
    public function create(object $payload);
    public function update(object $payload, string $uuid);
    public function delete(string $uuid);
}
