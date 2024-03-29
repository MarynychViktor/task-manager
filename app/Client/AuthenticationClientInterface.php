<?php


namespace App\Client;


use App\Entity\User;
use App\Exception\UserNotFoundException;

interface AuthenticationClientInterface
{
    /**
     * @param User $user
     */
    public function authenticate(User $user): void;

    /**
     * @return User|null
     *
     * @throws UserNotFoundException
     */
    public function currentUser(): ?User;

    /**
     *
     */
    public function logout(): void;

    /**
     * @param string $name
     * @param string $password
     *
     * @return bool
     */
    public function checkCredentials(string $name, string $password): bool;
}
