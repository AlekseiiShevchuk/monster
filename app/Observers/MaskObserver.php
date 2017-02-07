<?php

namespace App\Observers;


use App\Mask;
use App\User;

class MaskObserver
{
    private $users;

    public function __construct()
    {
        $this->users = User::all();
    }

    public function created(Mask $mask)
    {
        foreach ($this->users as $user) {
            $user->available_bodies()->attach($mask->id, ['is_purchase' => $mask->available_as_default]);
        }
    }
}