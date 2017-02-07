@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.mask.title')</h3>
    
    {!! Form::model($mask, ['method' => 'PUT', 'route' => ['masks.update', $mask->id], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('price', 'Price*', ['class' => 'control-label']) !!}
                    {!! Form::number('price', old('price'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('price'))
                        <p class="help-block">
                            {{ $errors->first('price') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('available_as_default', 'Available as default*', ['class' => 'control-label']) !!}
                    {!! Form::hidden('available_as_default', 0) !!}
                    {!! Form::checkbox('available_as_default', 1, old('available_as_default')) !!}
                    <p class="help-block"></p>
                    @if($errors->has('available_as_default'))
                        <p class="help-block">
                            {{ $errors->first('available_as_default') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

