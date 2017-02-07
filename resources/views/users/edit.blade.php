@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.users.title')</h3>
    
    {!! Form::model($user, ['method' => 'PUT', 'route' => ['users.update', $user->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', 'Name*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('email', 'Email*', ['class' => 'control-label']) !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('email'))
                        <p class="help-block">
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('password', 'Password', ['class' => 'control-label']) !!}
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('password'))
                        <p class="help-block">
                            {{ $errors->first('password') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('role_id', 'Role*', ['class' => 'control-label']) !!}
                    {!! Form::select('role_id', $roles, old('role_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('role_id'))
                        <p class="help-block">
                            {{ $errors->first('role_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('device_id', 'Device id', ['class' => 'control-label']) !!}
                    {!! Form::text('device_id', old('device_id'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('device_id'))
                        <p class="help-block">
                            {{ $errors->first('device_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('current_hair_id', 'Current hair', ['class' => 'control-label']) !!}
                    {!! Form::select('current_hair_id', $current_hairs, old('current_hair_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('current_hair_id'))
                        <p class="help-block">
                            {{ $errors->first('current_hair_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('current_mask_id', 'Current mask', ['class' => 'control-label']) !!}
                    {!! Form::select('current_mask_id', $current_masks, old('current_mask_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('current_mask_id'))
                        <p class="help-block">
                            {{ $errors->first('current_mask_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('current_body_id', 'Current body', ['class' => 'control-label']) !!}
                    {!! Form::select('current_body_id', $current_bodies, old('current_body_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('current_body_id'))
                        <p class="help-block">
                            {{ $errors->first('current_body_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('current_suit_id', 'Current suit', ['class' => 'control-label']) !!}
                    {!! Form::select('current_suit_id', $current_suits, old('current_suit_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('current_suit_id'))
                        <p class="help-block">
                            {{ $errors->first('current_suit_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('available_hairs', 'Available hairs', ['class' => 'control-label']) !!}
                    {!! Form::select('available_hairs[]', $available_hairs, old('available_hairs') ? old('available_hairs') : $user->available_hairs->pluck('id')->toArray(), ['class' => 'form-control select2', 'multiple' => 'multiple']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('available_hairs'))
                        <p class="help-block">
                            {{ $errors->first('available_hairs') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('available_masks', 'Available masks', ['class' => 'control-label']) !!}
                    {!! Form::select('available_masks[]', $available_masks, old('available_masks') ? old('available_masks') : $user->available_masks->pluck('id')->toArray(), ['class' => 'form-control select2', 'multiple' => 'multiple']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('available_masks'))
                        <p class="help-block">
                            {{ $errors->first('available_masks') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('available_bodies', 'Available bodies', ['class' => 'control-label']) !!}
                    {!! Form::select('available_bodies[]', $available_bodies, old('available_bodies') ? old('available_bodies') : $user->available_bodies->pluck('id')->toArray(), ['class' => 'form-control select2', 'multiple' => 'multiple']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('available_bodies'))
                        <p class="help-block">
                            {{ $errors->first('available_bodies') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('available_suits', 'Available suits', ['class' => 'control-label']) !!}
                    {!! Form::select('available_suits[]', $available_suits, old('available_suits') ? old('available_suits') : $user->available_suits->pluck('id')->toArray(), ['class' => 'form-control select2', 'multiple' => 'multiple']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('available_suits'))
                        <p class="help-block">
                            {{ $errors->first('available_suits') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('results', 'Results', ['class' => 'control-label']) !!}
                    {!! Form::select('results[]', $results, old('results') ? old('results') : $user->results->pluck('id')->toArray(), ['class' => 'form-control select2', 'multiple' => 'multiple']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('results'))
                        <p class="help-block">
                            {{ $errors->first('results') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

