<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Suit;
use Illuminate\Support\Facades\Auth;

class SuitsController extends Controller
{
    public function change(Suit $suit)
    {
        $user = Auth::user();
        $suitWithPivot = $user->available_suits()->where('suit_id', $suit->id)->first();

        if (0 == $suitWithPivot->pivot->is_purchase) {
            return response('You can not get this item (buy it first)', 401);
        }

        $user->current_suit()->associate($suit);
        return $user;
    }

    public function buy(Suit $suit)
    {
        $user = Auth::user();

        if ($user->score < $suit->price) {
            return response('You do not have enough scores to buy this item', 401);
        }

        $suitWithPivot = $user->available_suits()->where('suit_id', $suit->id)->first();

        if (1 == $suitWithPivot->pivot->is_purchase) {
            return response('you already have this item', 401);
        }

        //buying
        $user->score = ($user->score - $suit->price);
        $user->save();
        $suitWithPivot->pivot->is_purchase = 1;
        $suitWithPivot->pivot->save();
        //refresh model from DB before return
        return $user->find($user->id);
    }
}
