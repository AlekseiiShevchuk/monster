@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.tests.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.tests.fields.name-en')</th>
                            <td>{{ $test->name_en }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.tests.fields.name-da')</th>
                            <td>{{ $test->name_da }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.tests.fields.group')</th>
                            <td>{{ $test->group }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#results" aria-controls="results" role="tab" data-toggle="tab">Results</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="results">
<table class="table table-bordered table-striped {{ count($results) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.results.fields.user')</th>
                        <th>@lang('quickadmin.results.fields.test')</th>
                        <th>@lang('quickadmin.results.fields.earned-scores')</th>
                        <th>@lang('quickadmin.results.fields.correct-answers')</th>
                        <th>@lang('quickadmin.results.fields.incorrect-answers')</th>
                        <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        @if (count($results) > 0)
            @foreach ($results as $result)
                <tr data-entry-id="{{ $result->id }}">
                    <td>{{ $result->user->name or '' }}</td>
                                <td>{{ $result->test->name_en or '' }}</td>
                                <td>{{ $result->earned_scores }}</td>
                                <td>{{ $result->correct_answers }}</td>
                                <td>{{ $result->incorrect_answers }}</td>
                                <td>
                                    @can('result_view')
                                    <a href="{{ route('results.show',[$result->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.view')</a>
                                    @endcan
                                    @can('result_edit')
                                    <a href="{{ route('results.edit',[$result->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.edit')</a>
                                    @endcan
                                    @can('result_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.are_you_sure")."');",
                                        'route' => ['results.destroy', $result->id])) !!}
                                    {!! Form::submit(trans('quickadmin.delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
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

            <p>&nbsp;</p>

            <a href="{{ route('tests.index') }}" class="btn btn-default">@lang('quickadmin.back_to_list')</a>
        </div>
    </div>
@stop