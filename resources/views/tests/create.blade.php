@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.tests.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['tests.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name_en', 'Name en*', ['class' => 'control-label']) !!}
                    {!! Form::text('name_en', old('name_en'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name_en'))
                        <p class="help-block">
                            {{ $errors->first('name_en') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name_da', 'Name da*', ['class' => 'control-label']) !!}
                    {!! Form::text('name_da', old('name_da'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name_da'))
                        <p class="help-block">
                            {{ $errors->first('name_da') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('group', 'Group*', ['class' => 'control-label']) !!}
                    {!! Form::text('group', old('group'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('group'))
                        <p class="help-block">
                            {{ $errors->first('group') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

