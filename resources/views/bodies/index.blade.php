@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.body.title')</h3>
    @can('body_create')
    <p>
        <a href="{{ route('bodies.create') }}" class="btn btn-success">@lang('quickadmin.add_new')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($bodies) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        @can('body_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.body.fields.image')</th>
                        <th>@lang('quickadmin.body.fields.price')</th>
                        <th>@lang('quickadmin.body.fields.available-as-default')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($bodies) > 0)
                        @foreach ($bodies as $body)
                            <tr data-entry-id="{{ $body->id }}">
                                @can('body_delete')
                                    <td></td>
                                @endcan

                                <td>@if($body->image)<a href="{{ asset('uploads/' . $body->image) }}" target="_blank"><img src="{{ asset('uploads/thumb/' . $body->image) }}"/></a>@endif</td>
                                <td>{{ $body->price }}</td>
                                <td>{{ Form::checkbox("available_as_default", 1, $body->available_as_default == 1, ["disabled"]) }}</td>
                                <td>
                                    @can('body_view')
                                    <a href="{{ route('bodies.show',[$body->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.view')</a>
                                    @endcan
                                    @can('body_edit')
                                    <a href="{{ route('bodies.edit',[$body->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.edit')</a>
                                    @endcan
                                    @can('body_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.are_you_sure")."');",
                                        'route' => ['bodies.destroy', $body->id])) !!}
                                    {!! Form::submit(trans('quickadmin.delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5">@lang('quickadmin.no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('body_delete')
            window.route_mass_crud_entries_destroy = '{{ route('bodies.mass_destroy') }}';
        @endcan

    </script>
@endsection