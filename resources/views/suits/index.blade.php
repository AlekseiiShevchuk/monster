@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.suit.title')</h3>
    @can('suit_create')
    <p>
        <a href="{{ route('suits.create') }}" class="btn btn-success">@lang('quickadmin.add_new')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($suits) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        @can('suit_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.suit.fields.image')</th>
                        <th>@lang('quickadmin.suit.fields.price')</th>
                        <th>@lang('quickadmin.suit.fields.available-as-default')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($suits) > 0)
                        @foreach ($suits as $suit)
                            <tr data-entry-id="{{ $suit->id }}">
                                @can('suit_delete')
                                    <td></td>
                                @endcan

                                <td>@if($suit->image)<a href="{{ asset('uploads/' . $suit->image) }}" target="_blank"><img src="{{ asset('uploads/thumb/' . $suit->image) }}"/></a>@endif</td>
                                <td>{{ $suit->price }}</td>
                                <td>{{ Form::checkbox("available_as_default", 1, $suit->available_as_default == 1, ["disabled"]) }}</td>
                                <td>
                                    @can('suit_view')
                                    <a href="{{ route('suits.show',[$suit->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.view')</a>
                                    @endcan
                                    @can('suit_edit')
                                    <a href="{{ route('suits.edit',[$suit->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.edit')</a>
                                    @endcan
                                    @can('suit_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.are_you_sure")."');",
                                        'route' => ['suits.destroy', $suit->id])) !!}
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
        @can('suit_delete')
            window.route_mass_crud_entries_destroy = '{{ route('suits.mass_destroy') }}';
        @endcan

    </script>
@endsection