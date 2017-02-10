<?php

namespace App\Http\Controllers\Api\V1;

use App\Body;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BodiesController extends Controller
{
    public function change(Body $body)
    {
        $user = Auth::user();
        $bodyWithPivot = $user->available_bodies()->where('body_id', $body->id)->first();

        if (0 == $bodyWithPivot->pivot->is_purchase) {
            return response('You can not get this item (buy it first)', 401);
        }

        $user->current_body()->associate($body);
        return $user;
    }

    public function buy(Body $body)
    {
        $user = Auth::user();

        if ($user->score < $body->price) {
            return response('You do not have enough scores to buy this item', 401);
        }

        $bodyWithPivot = $user->available_bodies()->where('body_id', $body->id)->first();

        if (1 == $bodyWithPivot->pivot->is_purchase) {
            return response('you already have this item', 401);
        }

        //buying
        $user->score = ($user->score - $body->price);
        $user->save();
        $bodyWithPivot->pivot->is_purchase = 1;
        $bodyWithPivot->pivot->save();
        //refresh model from DB before return
        return $user->find($user->id);
    }
}
