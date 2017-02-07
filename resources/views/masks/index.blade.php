@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.mask.title')</h3>
    @can('mask_create')
    <p>
        <a href="{{ route('masks.create') }}" class="btn btn-success">@lang('quickadmin.add_new')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($masks) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        @can('mask_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.mask.fields.image')</th>
                        <th>@lang('quickadmin.mask.fields.price')</th>
                        <th>@lang('quickadmin.mask.fields.available-as-default')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($masks) > 0)
                        @foreach ($masks as $mask)
                            <tr data-entry-id="{{ $mask->id }}">
                                @can('mask_delete')
                                    <td></td>
                                @endcan

                                <td>@if($mask->image)<a href="{{ asset('uploads/' . $mask->image) }}" target="_blank"><img src="{{ asset('uploads/thumb/' . $mask->image) }}"/></a>@endif</td>
                                <td>{{ $mask->price }}</td>
                                <td>{{ Form::checkbox("available_as_default", 1, $mask->available_as_default == 1, ["disabled"]) }}</td>
                                <td>
                                    @can('mask_view')
                                    <a href="{{ route('masks.show',[$mask->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.view')</a>
                                    @endcan
                                    @can('mask_edit')
                                    <a href="{{ route('masks.edit',[$mask->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.edit')</a>
                                    @endcan
                                    @can('mask_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.are_you_sure")."');",
                                        'route' => ['masks.destroy', $mask->id])) !!}
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
        @can('mask_delete')
            window.route_mass_crud_entries_destroy = '{{ route('masks.mass_destroy') }}';
        @endcan

    </script>
@endsection