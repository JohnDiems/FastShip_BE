<?php

namespace App\Repositories;

use App\Interface\Repositories\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;


class UserRepository implements UserRepositoryInterface
{
    public function findMany(object $payload, string $sortField, string $sortOrder)
    {
        return User::filter($payload->all())
            ->orderBy($sortField, $sortOrder)
            ->paginate(config('services.paginate'));
    }

    public function findByEmail(string $email)
    {
        return User::where('email', $email)->first();
    }

    public function findById(int $id)
    {
        return User::find($id);
    }

    public function findByUuid(string $uuid)
    {
        return User::where('uuid', $uuid)->first();
    }

    public function create(object $payload)
    {
        $user = new User();
        $user->email = $payload->email;
        $user->name = $payload->name;
        $user->password = Hash::make($payload->password);
        $user->save();

        return $user->fresh();
    }

    public function update(object $payload, string $uuid) {}
    public function delete(string $uuid) {}
}
