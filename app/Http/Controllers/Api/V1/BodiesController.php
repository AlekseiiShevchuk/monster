<?php

namespace App\Http\Controllers\Api\V1;

use App\Body;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBodiesRequest;
use App\Http\Requests\UpdateBodiesRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class BodiesController extends Controller
{
    use FileUploadTrait;

    public function index()
    {
        return Body::all();
    }

    public function show($id)
    {
        return Body::findOrFail($id);
    }

    public function update(UpdateBodiesRequest $request, $id)
    {
        $request = $this->saveFiles($request);
        $body = Body::findOrFail($id);
        $body->update($request->all());

        return $body;
    }

    public function store(StoreBodiesRequest $request)
    {
        $request = $this->saveFiles($request);
        $body = Body::create($request->all());

        return $body;
    }

    public function destroy($id)
    {
        $body = Body::findOrFail($id);
        $body->delete();
        return '';
    }
}
