@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.localizations.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.localizations.fields.abbreviation')</th>
                            <td>{{ $localization->abbreviation }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.localizations.fields.name')</th>
                            <td>{{ $localization->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.localizations.fields.is-active')</th>
                            <td>
                                @if($localization->is_active == 1)
                                    <div class="btn-success">Active</div>
                                @endif
                                @if($localization->is_active == 0)
                                    <div class="btn-info">Not active</div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.localizations.fields.language-file')</th>
                            <td>@if($localization->language_file)<a href="{{ asset('uploads/'.$localization->language_file) }}" target="_blank">Download file</a>@endif</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('localizations.index') }}" class="btn btn-default">@lang('quickadmin.back_to_list')</a>
        </div>
    </div>
@stop