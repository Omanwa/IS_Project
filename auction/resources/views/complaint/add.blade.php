@extends('buyer')


@section('headTitle','Add Complaints - ')
@section('pageTitle','Add Complaints')


@section('content')
<form id="add-complaint-form" method="post" action="{{URL::to('complaint/save')}}">
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
                        <input type='Integer' required name="buyer_id" class="form-control" placeholder="Enter Buyer id">
                        <input type='string' required name="description" class="form-control" placeholder="Enter Description">
                        <label for="status" style="font-size: 16px">Choose a status:</label>
                        <select name ="status" id="status">
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select>
                    </div>
                    <input type='submit' name="submit" class="form-control btn btn-success">
                </div>
            </div>


        </div>
    </div>
</form>
@endsection
