@extends('admin')

@section('headTitle','Edit User - ')
@section('pageTitle','Edit User')

@section('content')
<form id="add-user-form" method="post" action="{{URL::to('user/saveChanges/'.$user->id)}}">
    @csrf
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="text-white">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group">
                    <!--input pattern="[a-zA-Z]{2,10}$" title="2 to 10 letters" required-->
                    < <input type='string' required name="Username" class="form-control" placeholder="Enter Username">
                    <input type='string' required name="Role" class="form-control" placeholder="Enter Role name">
                        <input type='string' required name="Email" class="form-control" placeholder="Enter Useremail">
                        <input type='password' required name="Password" class="form-control" placeholder="Enter Password">
                        <input type='password' required name="CPassword" class="form-control" placeholder="Enter Confirm Password">
                    </div>
                <input value="Save Changes" type="submit" name="submit" class="form-control btn btn-success">
            </div>
        </div>
    </div>
</form>
@endsection