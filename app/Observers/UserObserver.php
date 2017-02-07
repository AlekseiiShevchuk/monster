<?php

namespace App\Observers;

use App\Body;
use App\Hair;
use App\Mask;
use App\Suit;
use App\User;

class UserObserver
{
    private $hair;
    private $mask;
    private $body;
    private $suit;

    public function __construct()
    {
        $this->hair = Hair::where(['available_as_default' => true])->first();
        $this->mask = Mask::where(['available_as_default' => true])->first();
        $this->body = Body::where(['available_as_default' => true])->first();
        $this->suit = Suit::where(['available_as_default' => true])->first();
    }

    /**
     * Listen to the User created event.
     *
     * @param  User $user
     * @return void
     */
    public function created(User $user)
    {
        $hairs = Hair::all(['id', 'available_as_default']);
        foreach ($hairs as $hair) {
            $user->available_hairs()->attach($hair->id, ['is_purchase' => $hair->available_as_default]);
        }

        $masks = Mask::all(['id', 'available_as_default']);
        foreach ($masks as $mask) {
            $user->available_masks()->attach($mask->id, ['is_purchase' => $mask->available_as_default]);
        }

        $bodies = Body::all(['id', 'available_as_default']);
        foreach ($bodies as $body) {
            $user->available_bodies()->attach($body->id, ['is_purchase' => $body->available_as_default]);
        }

        $suits = Suit::all(['id', 'available_as_default']);
        foreach ($suits as $suit) {
            $user->available_suits()->attach($suit->id, ['is_purchase' => $suit->available_as_default]);
        }
    }

    public function creating(User $user)
    {
        $user->current_hair()->associate($this->hair);
        $user->current_mask()->associate($this->mask);
        $user->current_body()->associate($this->body);
        $user->current_suit()->associate($this->suit);
    }

    /**
     * Listen to the User deleting event.
     *
     * @param  User $user
     * @return void
     */
    public function deleting(User $user)
    {
        //
    }
}