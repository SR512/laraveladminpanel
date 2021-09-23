@extends('layouts.master')

@section('title') Edit Role @endsection
@section('css')

@endsection
@section('content')

    @component('common-components.breadcrumb',['li_1'=>['Dashboard'=>route('home'),'Role list'=>route('role.index')]])
        @slot('title') Edit Role  @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="float-right">
                        <a href="{{route('role.index')}}" class="btn btn-primary btn-sm"><i
                                class="mdi mdi-arrow-left"></i>
                            Back Role list</a>
                    </div>
                    <div class="clearfix"></div>
                    {!! Form::open(array('url' => route('roles.update',$role->id),'method'=>'PATCH','id'=>'role-form')) !!}
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="name">{{ __('Role') }}</label>
                            {!! Form::text('name',$role->name,['class'=>'form-control','placeholder'=>'Role name']) !!}
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                             </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Permission:</strong>
                            <br/>
                            @foreach($permissions as $value)
                                <label>{{ Form::checkbox('permission[]', $value->id,$role->hasPermissionTo($value->name)?true:false, array('class' => 'name')) }}
                                    {{ $value->name }}</label>
                                <br/>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        {{Form::submit('Add role',['class'=>'btn btn-primary btn-sm waves-effect waves-light'])}}
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
    {!! JsValidator::formRequest('App\Http\Requests\RoleRequest', '#role-form'); !!}
@endsection
