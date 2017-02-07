<?php

namespace App\Http\Controllers;

use App\Mask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreMasksRequest;
use App\Http\Requests\UpdateMasksRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class MasksController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Mask.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('mask_access')) {
            return abort(401);
        }
        $masks = Mask::all();

        return view('masks.index', compact('masks'));
    }

    /**
     * Show the form for creating new Mask.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('mask_create')) {
            return abort(401);
        }
        return view('masks.create');
    }

    /**
     * Store a newly created Mask in storage.
     *
     * @param  \App\Http\Requests\StoreMasksRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMasksRequest $request)
    {
        if (! Gate::allows('mask_create')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $mask = Mask::create($request->all());

        return redirect()->route('masks.index');
    }


    /**
     * Show the form for editing Mask.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('mask_edit')) {
            return abort(401);
        }
        $mask = Mask::findOrFail($id);

        return view('masks.edit', compact('mask'));
    }

    /**
     * Update Mask in storage.
     *
     * @param  \App\Http\Requests\UpdateMasksRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMasksRequest $request, $id)
    {
        if (! Gate::allows('mask_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $mask = Mask::findOrFail($id);
        $mask->update($request->all());

        return redirect()->route('masks.index');
    }


    /**
     * Display Mask.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('mask_view')) {
            return abort(401);
        }
        $relations = [
            'users' => \App\User::where('current_mask_id', $id)->get(),
            'users' => \App\User::whereHas('available_masks',
                    function ($query) use ($id) {
                        $query->where('id', $id);
                    })->get(),
        ];

        $mask = Mask::findOrFail($id);

        return view('masks.show', compact('mask') + $relations);
    }


    /**
     * Remove Mask from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('mask_delete')) {
            return abort(401);
        }
        $mask = Mask::findOrFail($id);
        $mask->delete();

        return redirect()->route('masks.index');
    }

    /**
     * Delete all selected Mask at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('mask_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Mask::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
