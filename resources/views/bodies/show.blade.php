@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.body.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.body.fields.image')</th>
                            <td>@if($body->image)<a href="{{ asset('uploads/' . $body->image) }}" target="_blank"><img src="{{ asset('uploads/thumb/' . $body->image) }}"/></a>@endif</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.body.fields.price')</th>
                            <td>{{ $body->price }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.body.fields.available-as-default')</th>
                            <td>{{ Form::checkbox("available_as_default", 1, $body->available_as_default == 1, ["disabled"]) }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('bodies.index') }}" class="btn btn-default">@lang('quickadmin.back_to_list')</a>
        </div>
    </div>
@stop