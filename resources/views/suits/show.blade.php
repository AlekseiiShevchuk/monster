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
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#users" aria-controls="users" role="tab" data-toggle="tab">Users</a></li>
<li role="presentation" class=""><a href="#users" aria-controls="users" role="tab" data-toggle="tab">Users</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="users">
<table class="table table-bordered table-striped {{ count($users) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.users.fields.name')</th>
                        <th>@lang('quickadmin.users.fields.email')</th>
                        <th>@lang('quickadmin.users.fields.role')</th>
                        <th>@lang('quickadmin.users.fields.device-id')</th>
                        <th>@lang('quickadmin.users.fields.current-hair')</th>
                        <th>@lang('quickadmin.users.fields.current-mask')</th>
                        <th>@lang('quickadmin.users.fields.current-body')</th>
                        <th>@lang('quickadmin.users.fields.current-suit')</th>
                        <th>@lang('quickadmin.users.fields.available-hairs')</th>
                        <th>@lang('quickadmin.users.fields.available-masks')</th>
                        <th>@lang('quickadmin.users.fields.available-bodies')</th>
                        <th>@lang('quickadmin.users.fields.available-suits')</th>
                        <th>@lang('quickadmin.users.fields.results')</th>
                        <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        @if (count($users) > 0)
            @foreach ($users as $user)
                <tr data-entry-id="{{ $user->id }}">
                    <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role->title or '' }}</td>
                                <td>{{ $user->device_id }}</td>
                                <td>{{ $user->current_hair->image or '' }}</td>
                                <td>{{ $user->current_mask->image or '' }}</td>
                                <td>{{ $user->current_body->image or '' }}</td>
                                <td>{{ $user->current_suit->image or '' }}</td>
                                <td>
                                    @foreach ($user->available_hairs as $singleAvailableHairs)
                                        <span class="label label-info label-many">{{ $singleAvailableHairs->image }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($user->available_masks as $singleAvailableMasks)
                                        <span class="label label-info label-many">{{ $singleAvailableMasks->image }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($user->available_bodies as $singleAvailableBodies)
                                        <span class="label label-info label-many">{{ $singleAvailableBodies->image }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($user->available_suits as $singleAvailableSuits)
                                        <span class="label label-info label-many">{{ $singleAvailableSuits->image }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($user->results as $singleResults)
                                        <span class="label label-info label-many">{{ $singleResults->earned_scores }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @can('user_view')
                                    <a href="{{ route('users.show',[$user->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.view')</a>
                                    @endcan
                                    @can('user_edit')
                                    <a href="{{ route('users.edit',[$user->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.edit')</a>
                                    @endcan
                                    @can('user_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.are_you_sure")."');",
                                        'route' => ['users.destroy', $user->id])) !!}
                                    {!! Form::submit(trans('quickadmin.delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="17">@lang('quickadmin.no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="users">
<table class="table table-bordered table-striped {{ count($users) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.users.fields.name')</th>
                        <th>@lang('quickadmin.users.fields.email')</th>
                        <th>@lang('quickadmin.users.fields.role')</th>
                        <th>@lang('quickadmin.users.fields.device-id')</th>
                        <th>@lang('quickadmin.users.fields.current-hair')</th>
                        <th>@lang('quickadmin.users.fields.current-mask')</th>
                        <th>@lang('quickadmin.users.fields.current-body')</th>
                        <th>@lang('quickadmin.users.fields.current-suit')</th>
                        <th>@lang('quickadmin.users.fields.available-hairs')</th>
                        <th>@lang('quickadmin.users.fields.available-masks')</th>
                        <th>@lang('quickadmin.users.fields.available-bodies')</th>
                        <th>@lang('quickadmin.users.fields.available-suits')</th>
                        <th>@lang('quickadmin.users.fields.results')</th>
                        <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        @if (count($users) > 0)
            @foreach ($users as $user)
                <tr data-entry-id="{{ $user->id }}">
                    <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role->title or '' }}</td>
                                <td>{{ $user->device_id }}</td>
                                <td>{{ $user->current_hair->image or '' }}</td>
                                <td>{{ $user->current_mask->image or '' }}</td>
                                <td>{{ $user->current_body->image or '' }}</td>
                                <td>{{ $user->current_suit->image or '' }}</td>
                                <td>
                                    @foreach ($user->available_hairs as $singleAvailableHairs)
                                        <span class="label label-info label-many">{{ $singleAvailableHairs->image }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($user->available_masks as $singleAvailableMasks)
                                        <span class="label label-info label-many">{{ $singleAvailableMasks->image }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($user->available_bodies as $singleAvailableBodies)
                                        <span class="label label-info label-many">{{ $singleAvailableBodies->image }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($user->available_suits as $singleAvailableSuits)
                                        <span class="label label-info label-many">{{ $singleAvailableSuits->image }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($user->results as $singleResults)
                                        <span class="label label-info label-many">{{ $singleResults->earned_scores }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @can('user_view')
                                    <a href="{{ route('users.show',[$user->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.view')</a>
                                    @endcan
                                    @can('user_edit')
                                    <a href="{{ route('users.edit',[$user->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.edit')</a>
                                    @endcan
                                    @can('user_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.are_you_sure")."');",
                                        'route' => ['users.destroy', $user->id])) !!}
                                    {!! Form::submit(trans('quickadmin.delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="17">@lang('quickadmin.no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('suits.index') }}" class="btn btn-default">@lang('quickadmin.back_to_list')</a>
        </div>
    </div>
@stop