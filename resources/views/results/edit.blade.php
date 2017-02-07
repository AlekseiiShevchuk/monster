@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.results.title')</h3>
    
    {!! Form::model($result, ['method' => 'PUT', 'route' => ['results.update', $result->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('user_id', 'User*', ['class' => 'control-label']) !!}
                    {!! Form::select('user_id', $users, old('user_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('user_id'))
                        <p class="help-block">
                            {{ $errors->first('user_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('test_id', 'Test*', ['class' => 'control-label']) !!}
                    {!! Form::select('test_id', $tests, old('test_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('test_id'))
                        <p class="help-block">
                            {{ $errors->first('test_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('earned_scores', 'Earned scores*', ['class' => 'control-label']) !!}
                    {!! Form::number('earned_scores', old('earned_scores'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('earned_scores'))
                        <p class="help-block">
                            {{ $errors->first('earned_scores') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('correct_answers', 'Correct answers*', ['class' => 'control-label']) !!}
                    {!! Form::number('correct_answers', old('correct_answers'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('correct_answers'))
                        <p class="help-block">
                            {{ $errors->first('correct_answers') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('incorrect_answers', 'Incorrect answers*', ['class' => 'control-label']) !!}
                    {!! Form::number('incorrect_answers', old('incorrect_answers'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('incorrect_answers'))
                        <p class="help-block">
                            {{ $errors->first('incorrect_answers') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

