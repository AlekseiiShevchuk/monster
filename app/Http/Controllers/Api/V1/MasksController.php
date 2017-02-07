<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Mask;
use App\User;
use Illuminate\Support\Facades\Auth;

class MasksController extends Controller
{

    public function change(Mask $mask)
    {
        $user = Auth::user();
        $user->current_mask()->associate($mask);
        return $user;
    }

    public function buy(Mask $mask)
    {
        $user = Auth::user();
        $maskWithPivot = $user->available_masks()->where('mask_id',$mask->id)->first();
        $maskWithPivot->pivot->is_purchase = 1;
        $maskWithPivot->pivot->save();
        //refresh model from DB before return
        return $user->find($user->id);
    }
}
