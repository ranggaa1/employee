@extends('admin.layouts.master')

@section('content')
@if(isset(auth()->user()->role->permission ['name']['user']['can-view']))
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        All Users
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
                                            <th>SN</th>
                                            <th>Photo</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Department</th>
                                            <th>Designation</th>
                                            <th>Start Date</th>
                                            <th>Address</th>
                                            <th>Mobile Number</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                        
                                    </thead>
                                    <tbody>
                                    @if(
                                            count($users)>0
                                        )
                                        @foreach($users as $key => $users)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td><img src="{{asset('profile')}}/{{$users->image}}" class="img-fluid"></td>
                                            <td>{{$users->name}}</td>
                                            <td>{{$users->email}}</td>
                                            <td>@if($users->role->id==1)
                                                <span class="badge bg-success">{{$users->role->name}}</span>
                                                @else
                                                <span class="badge bg-primary">{{$users->role->name}}</span>
                                                @endif
                                            </td>
                                            <td>{{$users->department->name ??'' }}</td>
                                            <td>{{$users->designation}}</td>
                                            <td>{{$users->start_from}}</td>
                                            <td>{{$users->address}}</td>
                                            <td>{{$users->mobile_number}}</td>
                                            <td>@if(isset(auth()->user()->role->permission ['name']['user']['can-edit']))
                                                <a href="{{route('users.edit',[$users->id])}}"><i class="fas fa-edit"></i></a>
                                            @endif</td>
                                            <td>@if(isset(auth()->user()->role->permission ['name']['user']['can-delete']))
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal{{$users->id}}"><i class="fas fa-trash"></i></a>
                                                @endif
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal{{$users->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <form action="{{route('users.destroy',[$users->id])}}" method="post">@csrf
                                                    {{method_field('DELETE')}}
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure want to delete this user?
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
                                        <td>No users to display</td>
                                        @endif
                                    </tbody>
                                </table>
        </div>
    </div>
</div>
@endif
@endsection
