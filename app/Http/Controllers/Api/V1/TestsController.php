<?php

namespace App\Http\Controllers\Api\V1;

use App\Test;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTestsRequest;
use App\Http\Requests\UpdateTestsRequest;

class TestsController extends Controller
{
    public function index()
    {
        return Test::all();
    }

    public function show($id)
    {
        return Test::findOrFail($id);
    }

    public function update(UpdateTestsRequest $request, $id)
    {
        $test = Test::findOrFail($id);
        $test->update($request->all());

        return $test;
    }

    public function store(StoreTestsRequest $request)
    {
        $test = Test::create($request->all());

        return $test;
    }

    public function destroy($id)
    {
        $test = Test::findOrFail($id);
        $test->delete();
        return '';
    }
}
