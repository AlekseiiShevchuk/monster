<?php

namespace App\Http\Controllers\Api\V1;

use App\Result;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreResultsRequest;
use App\Http\Requests\UpdateResultsRequest;

class ResultsController extends Controller
{
    public function index()
    {
        return Result::all();
    }

    public function show($id)
    {
        return Result::findOrFail($id);
    }

    public function update(UpdateResultsRequest $request, $id)
    {
        $result = Result::findOrFail($id);
        $result->update($request->all());

        return $result;
    }

    public function store(StoreResultsRequest $request)
    {
        $result = Result::create($request->all());

        return $result;
    }

    public function destroy($id)
    {
        $result = Result::findOrFail($id);
        $result->delete();
        return '';
    }
}
