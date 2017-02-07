@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.users.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.users.fields.name')</th>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.email')</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.password')</th>
                            <td>---</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.role')</th>
                            <td>{{ $user->role->title or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.remember-token')</th>
                            <td>{{ $user->remember_token }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.device-id')</th>
                            <td>{{ $user->device_id }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.current-hair')</th>
                            <td>{{ $user->current_hair->image or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.current-mask')</th>
                            <td>{{ $user->current_mask->image or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.current-body')</th>
                            <td>{{ $user->current_body->image or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.current-suit')</th>
                            <td>{{ $user->current_suit->image or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.available-hairs')</th>
                            <td>
                                @foreach ($user->available_hairs as $singleAvailableHairs)
                                    <span class="label label-info label-many">{{ $singleAvailableHairs->image }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.available-masks')</th>
                            <td>
                                @foreach ($user->available_masks as $singleAvailableMasks)
                                    <span class="label label-info label-many">{{ $singleAvailableMasks->image }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.available-bodies')</th>
                            <td>
                                @foreach ($user->available_bodies as $singleAvailableBodies)
                                    <span class="label label-info label-many">{{ $singleAvailableBodies->image }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.available-suits')</th>
                            <td>
                                @foreach ($user->available_suits as $singleAvailableSuits)
                                    <span class="label label-info label-many">{{ $singleAvailableSuits->image }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.users.fields.results')</th>
                            <td>
                                @foreach ($user->results as $singleResults)
                                    <span class="label label-info label-many">{{ $singleResults->earned_scores }}</span>
                                @endforeach
                            </td>
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

            <a href="{{ route('users.index') }}" class="btn btn-default">@lang('quickadmin.back_to_list')</a>
        </div>
    </div>
@stop