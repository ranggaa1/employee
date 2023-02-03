@extends('admin.layouts.master')

@section('content')

<div class="container mt-5">
<nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        Leave Form
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
            <form action="{{route('leaves.store')}}" method="post" enctype="multipart/form-data">@csrf
            <div class="card">
                <div class="card-header">Create Leave</div>
                <div class="card-body">
                   <div class="form-group">
                    <label>From Date</label>
                    <input type="date" name="from" class="form-control @error('from') is-invalid @enderror" required="">
                    @error('from')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group">
                    <label>To Date</label>
                    <input type="date" name="to" class="form-control @error('to') is-invalid @enderror" required="">
                    @error('to')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group">
                    <label>Type of leave</label>
                    <select name="type" class="form-control">
                        <option value="annualleave">Annual Leave</option>
                        <option value="sickleave">Sick Leave</option>
                        <option value="parental">Parental</option>
                        <option value="other">Other Leave</option>
                    </select>
                    </div>
                    <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control" cols="30" rows="10"></textarea>                    
                    </div>
                    <br>
            <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
    </form>

    <table class="table table-dark table-striped mt-5">
                        <thead>
                            <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Date From</th>
                            <th scope="col">Date To</th>
                            <th scope="col">Description</th>
                            <th scope="col">Type</th>
                            
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($leaves as $leaves)
                            <tr>
                                <td>{{$leaves->user->name}}</td>
                                <td>
                                    {{$leaves->from}}
                                </td>
                                <td>
                                    {{$leaves->to}}
                                </td>
                                <td>
                                    {{$leaves->description}}
                                </td>
                                <td>
                                    {{$leaves->type}}
                                </td>
                              
                                <td>
                                    <a href="{{route('leaves.edit',[$leaves->id])}}"><i class="fas fa-edit"></i></a>
                                </td>
                                <td>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal{{$leaves->id}}"><i class="fas fa-trash"></i></a>
                                    
                                    <!-- Modal -->
                                    <div class="modal fade " id="exampleModal{{$leaves->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <form action="{{route('leaves.destroy',[$leaves->id])}}" method="post">@csrf
                                                    {{method_field('DELETE')}}
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title alert alert-danger" id="exampleModalLabel">Delete</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                       <span class="alert alert-danger">Are you sure want to delete this leaves?</span> 
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
                    </tbody>
                </table>
                
</div>

@endsection
