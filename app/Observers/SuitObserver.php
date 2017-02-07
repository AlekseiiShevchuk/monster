<?php

namespace App\Observers;


use App\Suit;
use App\User;

class SuitObserver
{
    private $users;

    public function __construct()
    {
        $this->users = User::all();
    }

    public function created(Suit $suit)
    {
        foreach ($this->users as $user) {
            $user->available_bodies()->attach($suit->id, ['is_purchase' => $suit->available_as_default]);
        }
    }
}