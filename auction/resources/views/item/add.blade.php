@extends('seller')

@section('headTitle','Add Item - ')
@section('pageTitle','Add Item')

@section('content')
<form id="add-item-form" method="post" action="{{URL::to('item/save')}}">
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

                        <input type='integer' required name="category_id" class="form-control" placeholder="Enter category id">
                        <input type='integer' required name="seller_id" class="form-control" placeholder="Enter seller id">
                        <input type='string' required name="item_name" class="form-control" placeholder="Enter Item name">
                        <input type='string' required name="item_startprice" class="form-control" placeholder="Enter start price">
                        <input type='time' required name="item_starttime" class="form-control" placeholder="Enter start time">
                        <input type='time' required name="item_endtime" class="form-control" placeholder="Enter end time">
                        <input type='text' required name="description" class="form-control" placeholder="Enter description">
                        <input type="file" name="image" class="form-control"  placeholder="Choose image" id="image">
               
                        <label for="status" style="font-size: 16px">Choose a status:</label>
                        <select name ="status" id="status">
                            <option value="active">active</option>
                            <option value="inactive">inactive</option>
                        </select>
                    </div>
                <input type="submit" name="submit" class="form-control btn btn-success">
            </div>
        </div>
    </div>
</form>
@endsection