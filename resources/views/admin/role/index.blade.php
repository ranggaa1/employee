@extends('admin.layouts.master')

@section('content')
@if(isset(auth()->user()->role->permission ['name']['role']['can-view']))
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        All Roles
                    </li>
                </ol>
            </nav>
            @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
            @endif
        <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                        
                                    </thead>
                                    <tbody>
                                    @if(
                                            count($roles)>0
                                        )
                                        @foreach($roles as $key => $roles)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$roles->name}}</td>
                                            <td>{{$roles->description}}</td>
                                            <td>@if(isset(auth()->user()->role->permission ['name']['role']['can-edit']))
                                                <a href="{{route('roles.edit',[$roles->id])}}"><i class="fas fa-edit"></i></a>
                                            @endif</td>
                                            <td>@if(isset(auth()->user()->role->permission ['name']['role']['can-delete']))
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal{{$roles->id}}"><i class="fas fa-trash"></i></a>
                                                @endif
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal{{$roles->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <form action="{{route('roles.destroy',[$roles->id])}}" method="post">@csrf
                                                    {{method_field('DELETE')}}
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure want to delete this roles?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </div>
                                                    </div>
                                                    </form>
                                                </div>
                                                </div>
                                                <!-- Modal End -->
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <td>No roles to display</td>
                                        @endif
                                    </tbody>
                                </table>
        </div>
    </div>
</div>

@endsection
@endif
