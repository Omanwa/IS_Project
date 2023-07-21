@extends('seller')

@section('headTitle','Edit item - ')
@section('pageTitle','Edit item')

@section('content')
<form id="add-item-form" method="post" action="{{URL::to('item/saveChanges/'.$items->item_id)}}">
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
                    <input type='text' value="{{$items->item_name}}" name="item_name" class="form-control"
                    placeholder="Please enter item name">
                    </div>
                <input value="Save Changes" type="submit" name="submit" class="form-control btn btn-success">
            </div>
        </div>
    </div>
</form>
@endsection