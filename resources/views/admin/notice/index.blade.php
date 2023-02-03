@extends('admin.layouts.master')

@if(isset(auth()->user()->role->permission ['name']['notice']['can-view']))
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <nav class="breadcrumb alert alert-primary" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        All Notices
                    </li>
                </ol>
            </nav>
            @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
            @endif
            @if(count($notices)>0)
            @foreach($notices as $notices)
            <div class="card alert alert-info">
                <div class="card-header alert alert-primary">{{$notices->title}}</div>

                <div class="card-body">
                   <p>{{$notices->description}}</p>
                   <p class="badge bg-success">Data : {{$notices->date}}</p>
                   <p class="badge bg-warning">Data : {{$notices->name}}</p>
                </div>
                <div class="card-footer">
                @if(isset(auth()->user()->role->permission ['name']['notice']['can-edit']))
                <a href="{{route('notices.edit',[$notices->id])}}"><i class="fas fa-edit"></i></a>
                @endif
                @if(isset(auth()->user()->role->permission ['name']['notice']['can-delete']))
                    <span class="float-end">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal{{$notices->id}}"><i class="fas fa-trash"></i></a>
                    @endif
                     <!-- Modal -->
                     <div class="modal fade" id="exampleModal{{$notices->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <form action="{{route('notices.destroy',[$notices->id])}}" method="post">@csrf
                                                    {{method_field('DELETE')}}
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure want to delete this notice?
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
                    </span>
                </div>
            </div>
            @endforeach

            @else
            <p>No notices created yet</p>
            @endif
        </div>
    </div>
</div>
@endsection
@endif