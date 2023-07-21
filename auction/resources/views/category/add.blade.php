@extends('admin')


@section('headTitle','Add Categories - ')
@section('pageTitle','Add Categories')


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
                        <input type='string' required name="category_name" class="form-control" placeholder="Enter Category name">
                        <input type='string' required name="description" class="form-control" placeholder="Enter Description">
                    </div>
                    <input type='submit' name="submit" class="form-control btn btn-success">
                </div>
            </div>


        </div>
    </div>
</form>
@endsection
