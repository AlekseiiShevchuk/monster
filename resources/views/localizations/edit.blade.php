@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.localizations.title')</h3>
    
    {!! Form::model($localization, ['method' => 'PUT', 'route' => ['localizations.update', $localization->id], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('abbreviation', 'Abbreviation*', ['class' => 'control-label']) !!}
                    {!! Form::text('abbreviation', old('abbreviation'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('abbreviation'))
                        <p class="help-block">
                            {{ $errors->first('abbreviation') }}
                        </p>
                    @endif
                </div>
            </div>
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
                    {!! Form::label('is_active', 'Is active*', ['class' => 'control-label']) !!}
                    {!! Form::hidden('is_active', 0) !!}
                    {!! Form::checkbox('is_active', 1, old('is_active')) !!}
                    <p class="help-block"></p>
                    @if($errors->has('is_active'))
                        <p class="help-block">
                            {{ $errors->first('is_active') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('language_file', 'Language file', ['class' => 'control-label']) !!}
                    @if ($localization->language_file)
                        <a href="{{ asset('uploads/'.$localization->language_file) }}" target="_blank">Download file</a>
                    @endif
                    {!! Form::file('language_file', ['class' => 'form-control']) !!}
                    {!! Form::hidden('language_file_max_size', 8) !!}
                    <p class="help-block"></p>
                    @if($errors->has('language_file'))
                        <p class="help-block">
                            {{ $errors->first('language_file') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

