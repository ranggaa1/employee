@extends('admin.layouts.master')

@if(isset(auth()->user()->role->permission ['name']['leave']['can-edit']))
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
            <form action="{{route('leaves.update',[$leaves->id])}}" method="post">@csrf
                {{method_field('PATCH')}}
            <div class="card">
                <div class="card-header">Update Leave</div>
                <div class="card-body">
                   <div class="form-group">
                    <label>From Date</label>
                    <input type="date" value="{{$leaves->from}}" name="from" class="form-control @error('from') is-invalid @enderror" required="">
                    @error('from')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group">
                    <label>To Date</label>
                    <input type="date" value="{{$leaves->to}}" name="to" class="form-control @error('to') is-invalid @enderror" required="">
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
                    <textarea name="description" class="form-control" cols="30" rows="10">{{$leaves->description}}</textarea>                    
                    </div>
                    <br>
            <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
    </form>

                  
</div>

@endsection
@endif
