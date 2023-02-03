@extends('admin.layouts.master')

@section('content')
@if(isset(auth()->user()->role->permission ['name']['role']['can-edit']))
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
        @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
            @endif
            <form action="{{route('roles.update',[$roles->id])}}" method="post">@csrf
                {{method_field('PATCH')}}
            <div class="card">
                <div class="card-header">{{ __('Update Role') }}</div>
                 <div class="card-body">
                   <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$roles->name}}">
                             @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror   
                </div>
                   <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" cols="30" rows="10">{{$roles->description}}</textarea>
                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror   
                </div>
                <br>
                   <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update</button>
                   </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection
@endif
