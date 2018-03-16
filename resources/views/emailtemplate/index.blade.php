@extends('layouts.app')

@section('page-title', trans('Templates'))


@section('content')



    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                {{ isset($user) ? $user->present()->nameOrEmail : trans('Novi template') }}
                <div class="pull-right">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('dashboard') }}">@lang('app.home')</a></li>
                        @if (isset($user) && isset($adminView))
                            <li><a href="{{ route('activity.index') }}">@lang('app.emailtemplate')</a></li>
                            <li class="active">{{ $user->present()->nameOrEmail }}</li>
                        @else
                            <li class="active">@lang('app.emailtemplate')</li>
                        @endif
                    </ol>
                </div>
            </h1>
        </div>
    </div>

    @include('partials.messages')




    {!! Form::open(['method'=>'POST', 'route'=>'emailtemplate.store','files'=>true]) !!}

    <div class="form-group">
        {!! Form::label('mail_from_label','Name:') !!}
        {!! Form::text('mail_from',null,['class'=>'form-control']) !!}
    </div>


    <div class="form-group">
        {!! Form::label('mail_from_address_label','From email address:') !!}
        {!! Form::text('mail_from_address',null,['class'=>'form-control']) !!}
    </div>


    <div class="form-group">
        {!! Form::label('mail_subject_label','Subject:') !!}
        {!! Form::text('mail_subject',null,['class'=>'form-control']) !!}
    </div>



   <div class="form-group">

        {!! Form::label('file_label'),' Upload' !!}
        {!! Form::file('file',null,['class'=>'form-control']) !!}

   </div>



    <!-- tinyeditor - text editor  -->

    @include('includes.tinyeditor')

    <div class="form-group">
        {!! Form::label('text_body','Body:') !!}
        {!! Form::textarea('text_body',null,['class'=>'form-control']) !!}
    </div>


    <div class="form-group">
        {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

@stop


