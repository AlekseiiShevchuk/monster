<?php

namespace App\Http\Controllers;

use App\Suit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreSuitsRequest;
use App\Http\Requests\UpdateSuitsRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class SuitsController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Suit.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('suit_access')) {
            return abort(401);
        }
        $suits = Suit::all();

        return view('suits.index', compact('suits'));
    }

    /**
     * Show the form for creating new Suit.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('suit_create')) {
            return abort(401);
        }
        return view('suits.create');
    }

    /**
     * Store a newly created Suit in storage.
     *
     * @param  \App\Http\Requests\StoreSuitsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSuitsRequest $request)
    {
        if (! Gate::allows('suit_create')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $suit = Suit::create($request->all());

        return redirect()->route('suits.index');
    }


    /**
     * Show the form for editing Suit.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('suit_edit')) {
            return abort(401);
        }
        $suit = Suit::findOrFail($id);

        return view('suits.edit', compact('suit'));
    }

    /**
     * Update Suit in storage.
     *
     * @param  \App\Http\Requests\UpdateSuitsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSuitsRequest $request, $id)
    {
        if (! Gate::allows('suit_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $suit = Suit::findOrFail($id);
        $suit->update($request->all());

        return redirect()->route('suits.index');
    }


    /**
     * Display Suit.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('suit_view')) {
            return abort(401);
        }
        $relations = [
            'users' => \App\User::where('current_suit_id', $id)->get(),
            'users' => \App\User::whereHas('available_suits',
                    function ($query) use ($id) {
                        $query->where('id', $id);
                    })->get(),
        ];

        $suit = Suit::findOrFail($id);

        return view('suits.show', compact('suit') + $relations);
    }


    /**
     * Remove Suit from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('suit_delete')) {
            return abort(401);
        }
        $suit = Suit::findOrFail($id);
        $suit->delete();

        return redirect()->route('suits.index');
    }

    /**
     * Delete all selected Suit at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('suit_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Suit::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
