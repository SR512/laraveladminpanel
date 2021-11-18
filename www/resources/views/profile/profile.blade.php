@extends('layouts.master')

@section('title') Profile @endsection
@section('css')
@endsection
@section('content')


    @component('common-components.breadcrumb',['li_1'=>['Dashboard'=>route('home')]])
        @slot('title') Profile  @endslot
    @endcomponent


    <!-- start row -->
    <div class="row">
        <div class="col-md-12 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="profile-widgets py-3">

                        <div class="text-center">
                            <div class="">
                                <img
                                    src="{{asset('images\users\avatar-2.jpg')}}"
                                    alt=""
                                    class="avatar-lg mx-auto img-thumbnail rounded-circle">
                            </div>

                            <div class="mt-3 ">
                                <a href="#"
                                   class="text-dark font-weight-medium font-size-16">{{auth()->user()->name}}</a>
                                <p class="text-body mt-1 mb-1">{{auth()->user()->email}}</p>
                                <p class="text-body mt-1 mb-1">{{auth()->user()->getRoleNames()->first()}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-xl-9">

            <div class="card">
                <div class="card-body">

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#profileinfo" role="tab">
                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                <span class="d-none d-sm-block">Profile info</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#changepassword" role="tab">
                                <span class="d-none d-sm-block">Change Password</span>
                            </a>
                        </li>
                    </ul>

                    <!-- Profile info Tab -->
                    <div class="tab-content p-3 text-muted">
                        <div class="tab-pane active" id="profileinfo" role="tabpanel">
                            {!! Form::open(array('url' => route('profile.update',auth()->user()->id),'method'=>'PATCH','id'=>'user-form','enctype'=>'multipart/form-data')) !!}
                            <input type="hidden" name="user_id" value="{{auth()->user()->id}}">

                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('Name')}}<span class="required">*</span>
                                        {!! Form::text('name',isset(auth()->user()->name)?auth()->user()->name:old('name'),['class'=>'form-control','placeholder'=>'Name']) !!}
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
                                        {!! Form::email('email',isset(auth()->user()->email)?auth()->user()->email:old('email'),['class'=>'form-control','placeholder'=>'Email']) !!}
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                             </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    {{Form::submit('Update',['class'=>'btn btn-primary btn-sm waves-effect waves-light'])}}
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                        <!-- Change Password Tab-->
                        <div class="tab-pane" id="changepassword" role="tabpanel">
                            {!! Form::open(array('url' => route('change.password'),'method'=>'POST','id'=>'chagepassword-form','enctype'=>'multipart/form-data')) !!}
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('Current password')}}<span class="required">*</span>
                                        {!! Form::password('current_password',['class'=>'form-control','placeholder'=>'Current password']) !!}
                                        @error('current_password')
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

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    {{Form::submit('Change Password',['class'=>'btn btn-primary btn-sm waves-effect waves-light'])}}
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    </div>

    <!-- end row -->
@endsection

@section('script')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\ChangePasswordRequest','#chagepassword-form'); !!}
    <script src="{{ URL::asset('/js/pages/profile.init.js')}}"></script>

@endsection
