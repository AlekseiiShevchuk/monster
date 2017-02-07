<?php

namespace App\Http\Controllers;

use App\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreResultsRequest;
use App\Http\Requests\UpdateResultsRequest;

class ResultsController extends Controller
{
    /**
     * Display a listing of Result.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('result_access')) {
            return abort(401);
        }
        $results = Result::all();

        return view('results.index', compact('results'));
    }

    /**
     * Show the form for creating new Result.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('result_create')) {
            return abort(401);
        }
        $relations = [
            'users' => \App\User::get()->pluck('name', 'id')->prepend('Please select', ''),
            'tests' => \App\Test::get()->pluck('name_en', 'id')->prepend('Please select', ''),
        ];

        return view('results.create', $relations);
    }

    /**
     * Store a newly created Result in storage.
     *
     * @param  \App\Http\Requests\StoreResultsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreResultsRequest $request)
    {
        if (! Gate::allows('result_create')) {
            return abort(401);
        }
        $result = Result::create($request->all());

        return redirect()->route('results.index');
    }


    /**
     * Show the form for editing Result.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('result_edit')) {
            return abort(401);
        }
        $relations = [
            'users' => \App\User::get()->pluck('name', 'id')->prepend('Please select', ''),
            'tests' => \App\Test::get()->pluck('name_en', 'id')->prepend('Please select', ''),
        ];

        $result = Result::findOrFail($id);

        return view('results.edit', compact('result') + $relations);
    }

    /**
     * Update Result in storage.
     *
     * @param  \App\Http\Requests\UpdateResultsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateResultsRequest $request, $id)
    {
        if (! Gate::allows('result_edit')) {
            return abort(401);
        }
        $result = Result::findOrFail($id);
        $result->update($request->all());

        return redirect()->route('results.index');
    }


    /**
     * Display Result.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('result_view')) {
            return abort(401);
        }
        $relations = [
            'users' => \App\User::get()->pluck('name', 'id')->prepend('Please select', ''),
            'tests' => \App\Test::get()->pluck('name_en', 'id')->prepend('Please select', ''),
            'users' => \App\User::whereHas('results',
                    function ($query) use ($id) {
                        $query->where('id', $id);
                    })->get(),
        ];

        $result = Result::findOrFail($id);

        return view('results.show', compact('result') + $relations);
    }


    /**
     * Remove Result from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('result_delete')) {
            return abort(401);
        }
        $result = Result::findOrFail($id);
        $result->delete();

        return redirect()->route('results.index');
    }

    /**
     * Delete all selected Result at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('result_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Result::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
