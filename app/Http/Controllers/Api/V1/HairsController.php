<?php

namespace App\Http\Controllers\Api\V1;

use App\Hair;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHairsRequest;
use App\Http\Requests\UpdateHairsRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class HairsController extends Controller
{
    use FileUploadTrait;

    public function index()
    {
        return Hair::all();
    }

    public function show($id)
    {
        return Hair::findOrFail($id);
    }

    public function update(UpdateHairsRequest $request, $id)
    {
        $request = $this->saveFiles($request);
        $hair = Hair::findOrFail($id);
        $hair->update($request->all());

        return $hair;
    }

    public function store(StoreHairsRequest $request)
    {
        $request = $this->saveFiles($request);
        $hair = Hair::create($request->all());

        return $hair;
    }

    public function destroy($id)
    {
        $hair = Hair::findOrFail($id);
        $hair->delete();
        return '';
    }
}
