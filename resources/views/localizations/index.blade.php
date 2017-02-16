@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.localizations.title')</h3>
    @can('localization_create')
    <p>
        
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($localizations) > 0 ? 'datatable' : '' }} ">
                <thead>
                    <tr>
                        
                        <th>@lang('quickadmin.localizations.fields.abbreviation')</th>
                        <th>@lang('quickadmin.localizations.fields.name')</th>
                        <th>@lang('quickadmin.localizations.fields.is-active')</th>
                        <th>@lang('quickadmin.localizations.fields.language-file')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($localizations) > 0)
                        @foreach ($localizations as $localization)
                            <tr data-entry-id="{{ $localization->id }}">
                                
                                <td>{{ $localization->abbreviation }}</td>
                                <td>{{ $localization->name }}</td>
                                <td>
                                    @if($localization->is_active == 1)
                                        <div class="btn-success">Active</div>
                                    @endif
                                    @if($localization->is_active == 0)
                                        <div class="btn-info">Not active</div>
                                    @endif
                                </td>
                                <td>@if($localization->language_file)<a href="{{ asset('uploads/'.$localization->language_file) }}" target="_blank">Download file</a>@endif</td>
                                <td>
                                    @can('localization_view')
                                    <a href="{{ route('localizations.show',[$localization->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.view')</a>
                                    @endcan
                                    @can('localization_edit')
                                    <a href="{{ route('localizations.edit',[$localization->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.edit')</a>
                                    @endcan
</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7">@lang('quickadmin.no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        
    </script>
@endsection