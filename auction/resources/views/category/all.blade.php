@extends('admin')


@section('headTitle','Categories - ')
@section('pageTitle','Categories')


@section('content')
<div class="row">
    <div class='col-12'>


        <div class="d-flex justify-content-end">
            <a class="btn btn-primary" href="{{URL::to('category/add')}}">
                <i class="fas fa-plus"></i> Add Category
            </a>
        </div>
        <div class="card mb-4">


            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7">Id</th>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7">Name</th>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7">Description</th>
                                <th class="align-middle text-center text-uppercase text-secondary text-s font-weight-bolder opacity-7">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categories as $category)
                            <tr>
                                <td><p class="text-s px-3 mb-0">{{$category->category_id}}</p></td>
                                <td><p class="text-s px-3 mb-0">{{$category->category_name}}</p></td>
                                <td><p class="text-s px-3 mb-0">{{$category->description}}</p></td>
                                <td class="align-middle text-center text-sm">
                                    <a href="{{URL::to('category/edit/'.$category->category_id)}}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a onclick= "return confirm('Are you sure?')" href="{{URL::to('category/delete/'.$category->category_id)}}">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3">No record</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="pagn-links">
                        {{$categories->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
    @if(session('status'))
        <script type="text/javascript">
            iziToast.show({
                icon: 'fa-solid fa-circle-check',
                message: "{{session('status')}}",
                position: 'topRight'
            });
        </script>
    @endif
@endsection
