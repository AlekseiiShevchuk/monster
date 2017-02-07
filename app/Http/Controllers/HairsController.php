<?php

namespace App\Http\Controllers;

use App\Hair;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreHairsRequest;
use App\Http\Requests\UpdateHairsRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class HairsController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Hair.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('hair_access')) {
            return abort(401);
        }
        $hairs = Hair::all();

        return view('hairs.index', compact('hairs'));
    }

    /**
     * Show the form for creating new Hair.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('hair_create')) {
            return abort(401);
        }
        return view('hairs.create');
    }

    /**
     * Store a newly created Hair in storage.
     *
     * @param  \App\Http\Requests\StoreHairsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHairsRequest $request)
    {
        if (! Gate::allows('hair_create')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $hair = Hair::create($request->all());

        return redirect()->route('hairs.index');
    }


    /**
     * Show the form for editing Hair.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('hair_edit')) {
            return abort(401);
        }
        $hair = Hair::findOrFail($id);

        return view('hairs.edit', compact('hair'));
    }

    /**
     * Update Hair in storage.
     *
     * @param  \App\Http\Requests\UpdateHairsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHairsRequest $request, $id)
    {
        if (! Gate::allows('hair_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $hair = Hair::findOrFail($id);
        $hair->update($request->all());

        return redirect()->route('hairs.index');
    }


    /**
     * Display Hair.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('hair_view')) {
            return abort(401);
        }
        $relations = [
            'users' => \App\User::where('current_hair_id', $id)->get(),
            'users' => \App\User::whereHas('available_hairs',
                    function ($query) use ($id) {
                        $query->where('id', $id);
                    })->get(),
        ];

        $hair = Hair::findOrFail($id);

        return view('hairs.show', compact('hair') + $relations);
    }


    /**
     * Remove Hair from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('hair_delete')) {
            return abort(401);
        }
        $hair = Hair::findOrFail($id);
        $hair->delete();

        return redirect()->route('hairs.index');
    }

    /**
     * Delete all selected Hair at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('hair_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Hair::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
