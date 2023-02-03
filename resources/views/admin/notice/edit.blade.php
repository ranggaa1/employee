@extends('admin.layouts.master')

@if(isset(auth()->user()->role->permission ['name']['notice']['can-edit']))
@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
        @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
            @endif
            <form action="{{route('notices.update',[$notices->id])}}" method="post">@csrf
                {{method_field('PATCH')}}
            <div class="card">
                <div class="card-header">{{ __('Edit Notice') }}</div>
                <div class="card-body">
                   <div class="form-group">
                    <label>Title</label>
                    <input type="text" value="{{$notices->title}}" name="title" class="form-control @error('title') is-invalid @enderror">
                             @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror   
                </div>
                   <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" cols="30" rows="10">{{$notices->description}}</textarea>
                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror   
                </div>
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" value="{{$notices->date}}" name="date" class="form-control @error('date') is-invalid @enderror" required="">
                    @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <label>Created By</label>
                    <input type="text" value="{{auth()->user()->name}}" name="name" class="form-control @error('name') is-invalid @enderror">
                             @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror   
                </div>
                <br>
                   <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                   </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection
@endif
