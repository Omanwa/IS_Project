@extends('layout')


@section('headTitle','Add Complaints - ')
@section('pageTitle','Add Complaints')


@section('content')
<form id="add-category-form" method="post" action="{{URL::to('category/save')}}">
    @csrf
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    @if ($errors->any())
                        <div class ="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="text-white">{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group">
                        <input type='string' required name="complaint_id" class="form-control" placeholder="Enter Complaint id">
                        <input type='string' required name="buyer_id" class="form-control" placeholder="Enter Buyer id">
                        <input type='string' required name="Description" class="form-control" placeholder="Enter Description">
                        <input type='string' required name="status" class="form-control" placeholder="Enter status">
                    </div>
                    <input type='submit' name="submit" class="form-control btn btn-success">
                </div>
            </div>


        </div>
    </div>
</form>
@endsection
