@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.results.title')</h3>
    @can('result_create')
    <p>
        <a href="{{ route('results.create') }}" class="btn btn-success">@lang('quickadmin.add_new')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($results) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        @can('result_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

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
                                @can('result_delete')
                                    <td></td>
                                @endcan

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
@stop

@section('javascript') 
    <script>
        @can('result_delete')
            window.route_mass_crud_entries_destroy = '{{ route('results.mass_destroy') }}';
        @endcan

    </script>
@endsection