<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreUsersRequest;
use App\Http\Requests\UpdateUsersRequest;

class UsersController extends Controller
{
    /**
     * Display a listing of User.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('user_access')) {
            return abort(401);
        }
        $users = User::all();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating new User.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('user_create')) {
            return abort(401);
        }
        $relations = [
            'roles' => \App\Role::get()->pluck('title', 'id')->prepend('Please select', ''),
            'current_hairs' => \App\Hair::get()->pluck('image', 'id')->prepend('Please select', ''),
            'current_masks' => \App\Mask::get()->pluck('image', 'id')->prepend('Please select', ''),
            'current_bodies' => \App\Body::get()->pluck('image', 'id')->prepend('Please select', ''),
            'current_suits' => \App\Suit::get()->pluck('image', 'id')->prepend('Please select', ''),
            'available_hairs' => \App\Hair::get()->pluck('image', 'id'),
            'available_masks' => \App\Mask::get()->pluck('image', 'id'),
            'available_bodies' => \App\Body::get()->pluck('image', 'id'),
            'available_suits' => \App\Suit::get()->pluck('image', 'id'),
            'results' => \App\Result::get()->pluck('earned_scores', 'id'),
        ];

        return view('users.create', $relations);
    }

    /**
     * Store a newly created User in storage.
     *
     * @param  \App\Http\Requests\StoreUsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsersRequest $request)
    {
        if (! Gate::allows('user_create')) {
            return abort(401);
        }
        $user = User::create($request->all());
        $user->available_hairs()->sync(array_filter((array)$request->input('available_hairs')));
        $user->available_masks()->sync(array_filter((array)$request->input('available_masks')));
        $user->available_bodies()->sync(array_filter((array)$request->input('available_bodies')));
        $user->available_suits()->sync(array_filter((array)$request->input('available_suits')));
        $user->results()->sync(array_filter((array)$request->input('results')));

        return redirect()->route('users.index');
    }


    /**
     * Show the form for editing User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('user_edit')) {
            return abort(401);
        }
        $relations = [
            'roles' => \App\Role::get()->pluck('title', 'id')->prepend('Please select', ''),
            'current_hairs' => \App\Hair::get()->pluck('image', 'id')->prepend('Please select', ''),
            'current_masks' => \App\Mask::get()->pluck('image', 'id')->prepend('Please select', ''),
            'current_bodies' => \App\Body::get()->pluck('image', 'id')->prepend('Please select', ''),
            'current_suits' => \App\Suit::get()->pluck('image', 'id')->prepend('Please select', ''),
            'available_hairs' => \App\Hair::get()->pluck('image', 'id'),
            'available_masks' => \App\Mask::get()->pluck('image', 'id'),
            'available_bodies' => \App\Body::get()->pluck('image', 'id'),
            'available_suits' => \App\Suit::get()->pluck('image', 'id'),
            'results' => \App\Result::get()->pluck('earned_scores', 'id'),
        ];

        $user = User::findOrFail($id);

        return view('users.edit', compact('user') + $relations);
    }

    /**
     * Update User in storage.
     *
     * @param  \App\Http\Requests\UpdateUsersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsersRequest $request, $id)
    {
        if (! Gate::allows('user_edit')) {
            return abort(401);
        }
        $user = User::findOrFail($id);
        $user->update($request->all());
        $user->available_hairs()->sync(array_filter((array)$request->input('available_hairs')));
        $user->available_masks()->sync(array_filter((array)$request->input('available_masks')));
        $user->available_bodies()->sync(array_filter((array)$request->input('available_bodies')));
        $user->available_suits()->sync(array_filter((array)$request->input('available_suits')));
        $user->results()->sync(array_filter((array)$request->input('results')));

        return redirect()->route('users.index');
    }


    /**
     * Display User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('user_view')) {
            return abort(401);
        }
        $relations = [
            'roles' => \App\Role::get()->pluck('title', 'id')->prepend('Please select', ''),
            'current_hairs' => \App\Hair::get()->pluck('image', 'id')->prepend('Please select', ''),
            'current_masks' => \App\Mask::get()->pluck('image', 'id')->prepend('Please select', ''),
            'current_bodies' => \App\Body::get()->pluck('image', 'id')->prepend('Please select', ''),
            'current_suits' => \App\Suit::get()->pluck('image', 'id')->prepend('Please select', ''),
            'available_hairs' => \App\Hair::get()->pluck('image', 'id'),
            'available_masks' => \App\Mask::get()->pluck('image', 'id'),
            'available_bodies' => \App\Body::get()->pluck('image', 'id'),
            'available_suits' => \App\Suit::get()->pluck('image', 'id'),
            'results' => \App\Result::get()->pluck('earned_scores', 'id'),
            'results' => \App\Result::where('user_id', $id)->get(),
        ];

        $user = User::findOrFail($id);

        return view('users.show', compact('user') + $relations);
    }


    /**
     * Remove User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('user_delete')) {
            return abort(401);
        }
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index');
    }

    /**
     * Delete all selected User at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('user_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = User::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
