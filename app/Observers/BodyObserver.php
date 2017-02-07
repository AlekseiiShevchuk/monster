<?php

namespace App\Observers;


use App\Body;
use App\User;

class BodyObserver
{
    private $users;

    public function __construct()
    {
        $this->users = User::all();
    }

    public function created(Body $body)
    {
        foreach ($this->users as $user) {
            $user->available_bodies()->attach($body->id, ['is_purchase' => $body->available_as_default]);
        }
    }
}