@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.hair.title')</h3>
    @can('hair_create')
    <p>
        <a href="{{ route('hairs.create') }}" class="btn btn-success">@lang('quickadmin.add_new')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($hairs) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        @can('hair_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.hair.fields.image')</th>
                        <th>@lang('quickadmin.hair.fields.price')</th>
                        <th>@lang('quickadmin.hair.fields.available-as-default')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($hairs) > 0)
                        @foreach ($hairs as $hair)
                            <tr data-entry-id="{{ $hair->id }}">
                                @can('hair_delete')
                                    <td></td>
                                @endcan

                                <td>@if($hair->image)<a href="{{ asset('uploads/' . $hair->image) }}" target="_blank"><img src="{{ asset('uploads/thumb/' . $hair->image) }}"/></a>@endif</td>
                                <td>{{ $hair->price }}</td>
                                <td>{{ Form::checkbox("available_as_default", 1, $hair->available_as_default == 1, ["disabled"]) }}</td>
                                <td>
                                    @can('hair_view')
                                    <a href="{{ route('hairs.show',[$hair->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.view')</a>
                                    @endcan
                                    @can('hair_edit')
                                    <a href="{{ route('hairs.edit',[$hair->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.edit')</a>
                                    @endcan
                                    @can('hair_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.are_you_sure")."');",
                                        'route' => ['hairs.destroy', $hair->id])) !!}
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
        @can('hair_delete')
            window.route_mass_crud_entries_destroy = '{{ route('hairs.mass_destroy') }}';
        @endcan

    </script>
@endsection