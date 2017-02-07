<?php

namespace App\Http\Controllers;

use App\Body;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreBodiesRequest;
use App\Http\Requests\UpdateBodiesRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class BodiesController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Body.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('body_access')) {
            return abort(401);
        }
        $bodies = Body::all();

        return view('bodies.index', compact('bodies'));
    }

    /**
     * Show the form for creating new Body.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('body_create')) {
            return abort(401);
        }
        return view('bodies.create');
    }

    /**
     * Store a newly created Body in storage.
     *
     * @param  \App\Http\Requests\StoreBodiesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBodiesRequest $request)
    {
        if (! Gate::allows('body_create')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $body = Body::create($request->all());

        return redirect()->route('bodies.index');
    }


    /**
     * Show the form for editing Body.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('body_edit')) {
            return abort(401);
        }
        $body = Body::findOrFail($id);

        return view('bodies.edit', compact('body'));
    }

    /**
     * Update Body in storage.
     *
     * @param  \App\Http\Requests\UpdateBodiesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBodiesRequest $request, $id)
    {
        if (! Gate::allows('body_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $body = Body::findOrFail($id);
        $body->update($request->all());

        return redirect()->route('bodies.index');
    }


    /**
     * Display Body.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('body_view')) {
            return abort(401);
        }
        $relations = [
            'users' => \App\User::where('current_body_id', $id)->get(),
            'users' => \App\User::whereHas('available_bodies',
                    function ($query) use ($id) {
                        $query->where('id', $id);
                    })->get(),
        ];

        $body = Body::findOrFail($id);

        return view('bodies.show', compact('body') + $relations);
    }


    /**
     * Remove Body from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('body_delete')) {
            return abort(401);
        }
        $body = Body::findOrFail($id);
        $body->delete();

        return redirect()->route('bodies.index');
    }

    /**
     * Delete all selected Body at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('body_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Body::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
