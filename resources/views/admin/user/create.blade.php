@extends('admin.layouts.master')

@section('content')
@if(isset(auth()->user()->role->permission ['name']['user']['can-add']))
<div class="container mt-5">
<nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        Register Employee
                    </li>
                </ol>
            </nav>
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
            @endif
            <form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">@csrf
            <div class="card">
                <div class="card-header">General Information</div>
                <div class="card-body">
                   <div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="firstname" class="form-control @error('firstname') is-invalid @enderror" required="">
                    @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" name="lastname" class="form-control @error('lastname') is-invalid @enderror" required="">
                    @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control" required="">
                    
                    </div>
                    <div class="form-group">
                    <label>Mobile Number</label>
                    <input type="text" name="mobile_number" class="form-control" required="">
                    
                    </div>
                    <div class="form-group">
                    <label>Department</label>
                    <select name="department_id" class="form-select" aria-label="Default select example" required="">
                    <option selected>Choose Department</option>
                    @foreach(App\Models\Department::all() as $departments)
                        <option value="{{$departments->id}}">{{$departments->name}}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="form-group">
                    <label>Designation</label>
                    <input type="text" name="designation" class="form-control @error('designation') is-invalid @enderror" required="">
                    @error('designation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group">
                    <label>Start Date</label>
                    <input type="date" name="start_from" id="datepicker" class="form-control @error('start_from') is-invalid @enderror" placeholder="dd-mm-yyyy" required="">
                    @error('start_from')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" accept="image/*" class="form-control @error('image') is-invalid @enderror">
                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                </div>
            </div>
        </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Login Information</div>
                    <div class="card-body">
                    <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group">
                    <label>Role</label>
                    <select name="role_id" class="form-select" aria-label="Default select example" required="">
                    <option selected>Choose Role</option>    
                    @foreach(App\Models\Role::all() as $roles)
                        <option value="{{$roles->id}}">{{$roles->name}}</option>
                        @endforeach

                    </select>
                        </div>
                    </div>
                </div>
            <br>
            <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
    </form>
</div>
@endif
@endsection
