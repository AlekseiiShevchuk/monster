<?php

namespace App\Http\Controllers;

use App\Localization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreLocalizationsRequest;
use App\Http\Requests\UpdateLocalizationsRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class LocalizationsController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Localization.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('localization_access')) {
            return abort(401);
        }
        $localizations = Localization::query()->orderBy('is_active','desc')->get();

        return view('localizations.index', compact('localizations'));
    }

    /**
     * Show the form for editing Localization.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('localization_edit')) {
            return abort(401);
        }
        $localization = Localization::findOrFail($id);

        return view('localizations.edit', compact('localization'));
    }

    /**
     * Update Localization in storage.
     *
     * @param  \App\Http\Requests\UpdateLocalizationsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLocalizationsRequest $request, $id)
    {
        if (! Gate::allows('localization_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $localization = Localization::findOrFail($id);
        $localization->update($request->all());

        return redirect()->route('localizations.index');
    }


    /**
     * Display Localization.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('localization_view')) {
            return abort(401);
        }
        $localization = Localization::findOrFail($id);

        return view('localizations.show', compact('localization'));
    }

}
