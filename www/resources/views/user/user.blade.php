@extends('layouts.master')

@section('title') User @endsection
@section('css')

@endsection
@section('content')

    @component('common-components.breadcrumb',['li_1'=>['Dashboard'=>route('home')]])
        @slot('title') User  @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="float-right">
                        <a href="{{route('users.create')}}" class="btn btn-primary btn-sm"><i
                                class="mdi mdi-plus"></i> New User</a>
                    </div>
                    <table id="user-data " class="table table-striped table-bordered dt-responsive mt-5"
                           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $key => $row)
                            <tr>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->getRoleNames()->first() }}</td>
{{--                                <td><span--}}
{{--                                        class="badge {{ $row->is_active == 'Y' ? 'badge-success':'badge-danger'}}">{{ $row->is_active == 'Y' ? 'Show':'Hide'}}</span>--}}
{{--                                </td>--}}
                                <td>
{{--                                    <a class="btn {{ $row->is_active == 'Y' ? 'btn-danger':'btn-success'}} btn-sm"--}}
{{--                                       href="{{ route('users.status',$row->id) }}"><i--}}
{{--                                            class="mdi {{ $row->is_active == 'Y' ? 'mdi-block-helper':'mdi-eye'}}"></i>&nbsp;{{ $row->is_active == 'Y' ? 'Hide':'Show'}}--}}
{{--                                    </a>--}}
                                    <a class="btn btn-primary btn-sm"
                                       href="{{ route('users.edit',$row->id) }}"><i
                                            class="mdi mdi-pencil"></i>&nbsp;Edit</a>
                                    <a href="#" class="edit btn btn-danger btn-sm"
                                       onclick="if(confirm('Are you sure you want to delete.')) document.getElementById('delete-{{ $row->id }}').submit()">
                                        <i class="fa fa-trash">&nbsp;Delete</i></a>
                                    <form id="delete-{{ $row->id }}" action="{{ route('users.destroy', $row->id) }}"
                                          method="POST">
                                        @method('DELETE')
                                        @csrf
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$users->links()}}
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
@endsection
@section('script')


@endsection
