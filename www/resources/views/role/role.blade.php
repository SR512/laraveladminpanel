@extends('layouts.master')

@section('title') Role @endsection
@section('css')

@endsection
@section('content')

    @component('common-components.breadcrumb',['li_1'=>['Dashboard'=>route('home')]])
        @slot('title') Role  @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="float-right">
                        <a href="{{route('roles.create')}}" class="btn btn-primary btn-sm"><i
                                class="mdi mdi-plus"></i> New Role</a>
                    </div>
                    <table id="role-data " class="table table-striped table-bordered dt-responsive mt-5"
                           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Role</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($roles as $key => $row)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->created_at_formatted }}</td>
                                <td>
                                    {{--<a class="btn btn-info btn-sm" href="{{ route('roles.show',$role->id) }}">Show</a>--}}
                                    <a class="btn btn-primary btn-sm" href="{{ route('roles.edit',$row->id) }}"><i class="mdi mdi-pencil"></i>&nbsp;Edit</a>
                                    <a href="#" class="edit btn btn-danger btn-sm"
                                       onclick="if(confirm('Are you sure you want to delete.')) document.getElementById('delete-{{ $row->id }}').submit()">
                                        <i class="fa fa-trash">&nbsp;Delete</i>
                                        <form id="delete-{{ $row->id }}" action="{{ route('roles.destroy', $row->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                        </form>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
@endsection
@section('script')


@endsection
