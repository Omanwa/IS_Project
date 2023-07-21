@extends('admin')


@section('headTitle','Add Users - ')
@section('pageTitle','Add Users')


@section('content')
<form id="add-user-form" method="post" action="{{URL::to('user/save')}}">
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
                        <input type='string' required name="username" class="form-control" placeholder="Enter Username">
                        <input type='string' required name="role" class="form-control" placeholder="Enter Role name">
                        <input type='string' required name="email" class="form-control" placeholder="Enter Useremail">
                        <input type='password' required name="password" class="form-control" placeholder="Enter Password">
                        <input type='password' required name="cpassword" class="form-control" placeholder="Enter Confirm Password">
                    </div>
                    <input type='submit' name="submit" class="form-control btn btn-success">
                </div>
            </div>


        </div>
    </div>
</form>
@endsection
