@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.mask.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.mask.fields.image')</th>
                            <td>@if($mask->image)<a href="{{ asset('uploads/' . $mask->image) }}" target="_blank"><img src="{{ asset('uploads/thumb/' . $mask->image) }}"/></a>@endif</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.mask.fields.price')</th>
                            <td>{{ $mask->price }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.mask.fields.available-as-default')</th>
                            <td>{{ Form::checkbox("available_as_default", 1, $mask->available_as_default == 1, ["disabled"]) }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('masks.index') }}" class="btn btn-default">@lang('quickadmin.back_to_list')</a>
        </div>
    </div>
@stop