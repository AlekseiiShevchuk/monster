<?php

namespace App\Http\Controllers\Api\V1;

use App\Hair;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HairsController extends Controller
{
    public function change(Hair $hair)
    {
        $user = Auth::user();
        $hairWithPivot = $user->available_hairs()->where('hair_id', $hair->id)->first();

        if (0 == $hairWithPivot->pivot->is_purchase) {
            return response('You can not get this item (buy it first)', 401);
        }

        $user->current_hair()->associate($hair);
        return $user;
    }

    public function buy(Hair $hair)
    {
        $user = Auth::user();

        if ($user->score < $hair->price) {
            return response('You do not have enough scores to buy this item', 401);
        }

        $hairWithPivot = $user->available_hairs()->where('hair_id', $hair->id)->first();

        if (1 == $hairWithPivot->pivot->is_purchase) {
            return response('you already have this item', 401);
        }

        //buying
        $user->score = ($user->score - $hair->price);
        $user->save();
        $hairWithPivot->pivot->is_purchase = 1;
        $hairWithPivot->pivot->save();
        //refresh model from DB before return
        return $user->find($user->id);
    }
}
