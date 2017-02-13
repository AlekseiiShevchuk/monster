@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.suit.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.suit.fields.image')</th>
                            <td>@if($suit->image)<a href="{{ asset('uploads/' . $suit->image) }}" target="_blank"><img src="{{ asset('uploads/thumb/' . $suit->image) }}"/></a>@endif</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.suit.fields.price')</th>
                            <td>{{ $suit->price }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.suit.fields.available-as-default')</th>
                            <td>{{ Form::checkbox("available_as_default", 1, $suit->available_as_default == 1, ["disabled"]) }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('suits.index') }}" class="btn btn-default">@lang('quickadmin.back_to_list')</a>
        </div>
    </div>
@stop