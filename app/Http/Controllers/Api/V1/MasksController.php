<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Mask;
use Illuminate\Support\Facades\Auth;

class MasksController extends Controller
{

    public function change(Mask $mask)
    {
        $user = Auth::user();
        $maskWithPivot = $user->available_masks()->where('mask_id', $mask->id)->first();

        if (0 == $maskWithPivot->pivot->is_purchase) {
            return response('You can not get this item (buy it first)', 401);
        }

        $user->current_mask()->associate($mask);
        return $user;
    }

    public function buy(Mask $mask)
    {
        $user = Auth::user();

        if ($user->score < $mask->price) {
            return response('You do not have enough scores to buy this item', 401);
        }

        $maskWithPivot = $user->available_masks()->where('mask_id', $mask->id)->first();

        if (1 == $maskWithPivot->pivot->is_purchase) {
            return response('you already have this item', 401);
        }

        //buying
        $user->score = ($user->score - $mask->price);
        $user->save();
        $maskWithPivot->pivot->is_purchase = 1;
        $maskWithPivot->pivot->save();
        //refresh model from DB before return
        return $user->find($user->id);
    }
}
