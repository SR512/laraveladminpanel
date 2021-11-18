@extends('layouts.master')

@section('title') {{isset($user) ? 'Edit':'New'}} User @endsection
@section('css')

@endsection
@section('content')

    @component('common-components.breadcrumb',['li_1'=>['Dashboard'=>route('home'),'User list'=>route('user.index')]])
        @slot('title') {{isset($user) ? 'Edit':'New'}} User  @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="float-right">
                        <a href="{{route('user.index')}}" class="btn btn-primary btn-sm"><i
                                class="mdi mdi-arrow-left"></i>
                            Back to list</a>
                    </div>
                    <div class="clearfix"></div>
                    @if(isset($user))
                        {!! Form::open(array('url' => route('users.update',$user->id),'method'=>'PATCH','id'=>'user-form','enctype'=>'multipart/form-data')) !!}

                    @else
                        {!! Form::open(array('route' => 'users.store','method'=>'POST','id'=>'user-form')) !!}
                    @endif
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                {{ Form::label('Role')}}
                                {!! Form::select('role',$roles,isset($user)?$user->roles->pluck('id')->first():old('role'),['class'=>'form-control','placeholder'=>'Select role']) !!}
                                @error('role')
                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                             </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
{{--                            <div class="form-group">--}}
{{--                                {{ Form::label('Profile picture')}}<span class="required">*</span>--}}
{{--                                {!! Form::file('profile_picture',['class'=>'form-control']) !!}--}}
{{--                                <input type="hidden" value="{{(isset($user) && !empty($user->user_profile->first()->profile_picture))?$user->user_profile->first()->profile_picture:null}}" name="profile">--}}
{{--                                @error('profile_picture')--}}
{{--                                <span class="invalid-feedback" role="alert">--}}
{{--                                <strong>{{ $message }}</strong>--}}
{{--                             </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                {{ Form::label('Name')}}<span class="required">*</span>
                                {!! Form::text('name',isset($user)?$user->name:old('name'),['class'=>'form-control','placeholder'=>'Name']) !!}
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                             </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                {{ Form::label('Email')}}<span class="required">*</span>
                                {!! Form::email('email',isset($user)?$user->email:old('name'),['class'=>'form-control','placeholder'=>'Email']) !!}
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                             </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                {{ Form::label('Password')}}<span class="required">*</span>
                                {!! Form::password('password',['class'=>'form-control','placeholder'=>'Password']) !!}
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                             </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                {{ Form::label('Confirm Password')}}<span class="required">*</span>
                                {!! Form::password('password_confirmation',['class'=>'form-control','placeholder'=>'Confirm password']) !!}
                            </div>
                        </div>

                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        {{Form::submit(isset($user)?'Update user':'Add user',['class'=>'btn btn-primary btn-sm waves-effect waves-light'])}}
                    </div>
                </div>
            </div>


            {!! Form::close() !!}
        </div>
    </div>
    </div>
    <!-- end col -->
    </div>
@endsection
@section('script')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\UserRequest', '#user-form'); !!}
@endsection
