@extends('admin.layouts.master')
@if(isset(auth()->user()->role->permission ['name']['leave']['can-list']))
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('All Leaves') }}</div>

                <div class="card-body">
                <table class="table table-dark table-striped mt-5">
                        <thead>
                            <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Date From</th>
                            <th scope="col">Date To</th>
                            <th scope="col">Description</th>
                            <th scope="col">Type</th>
                            <th scope="col">Reply</th>
                            <th scope="col">Status</th>
                            <th scope="col">Confirmation</th>
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
                                    {{$leaves->massage}}
                                </td>
                                <td>
                                    @if($leaves->status=='0')
                                        <span class="badge bg-danger">Pending</span>
                                        @else
                                        <span class="badge bg-success">Approve</span>
                                    @endif
                                </td>
                                <td>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal{{$leaves->id}}"><i class="fas fa-pencil fa-fw"></i></a>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{$leaves->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <form action="{{route('accept.reject',[$leaves->id])}}" method="post">@csrf
                                                    {{method_field('POST')}}
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title breadcrumb alert alert-primary " id="exampleModalLabel">Confirm Leave</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                        <label class="breadcrumb alert alert-primary">Status</label>
                                                        <select class="form-control" name="status" required="">
                                                            <option value="0">Pending</option>
                                                            <option value="1">Accepted</option>
                                                        </select>
                                                       </div>
                                                       <br>
                                                       <div class="form-group">
                                                        <label class="breadcrumb alert alert-primary">Note</label>
                                                        <textarea name="massage" class="form-control" required="" cols="40" rows="4"></textarea>
                                                       </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-danger">Confirm</button>
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
            </div>
        </div>
    </div>
</div>
@endsection
@endif
