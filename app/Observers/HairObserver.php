<?php

namespace App\Observers;


use App\Hair;
use App\User;

class HairObserver
{
    private $users;

    public function __construct()
    {
        $this->users = User::all();
    }

    public function created(Hair $hair)
    {
        foreach ($this->users as $user) {
            $user->available_bodies()->attach($hair->id, ['is_purchase' => $hair->available_as_default]);
        }
    }
}