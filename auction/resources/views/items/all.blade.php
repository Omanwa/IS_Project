@extends('layout')
@section('headTitle','Roles - ')
@section('pageTitle','Roles')
@section('content')

<div class="row">
 <div class='col-12'>
 <!--add{display:flex;}-->
   <div class="d-flex justify-content-end">
   <a class="btn btn-primary" href="{{URL::to('role/add')}}">
   <i class="fas fa-plus"></i> Add Role
   </a>
   </div>
   <div class="card mb-4">
   </div>
      <div class="card-body px-0 pt-0 pb-2">
      <div class="table-responsive p-0">
      <table class="table align-items-center mb-0">
      <thead>
      <tr>
      <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">#</th>
      <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Name</th>
      <th class="align-middle text-centre text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Actions</th>
      </tr>
      </thead>
      <tbody>
      @forelse($roles as $role)
      <tr>
      <td> <p class="text-xs px-3 font-weight-bold mb-0">{{$role->id}}</p></td>
      <td> <p class="text-xs px-3 mb-0">{{$role->name}}</p></td>
      <td class="align-middle text-centre text-sm">
      <a href="{{URL::to('role/edit/'.$role->id)}}">
      <i class="fa-solid fa-pen-to-square"></i>
      </a>
      <a onclick="return confirm('Are you sure?')" href="{{URL::to('role/delete/'.$role->id)}}"onclick="confirm()">
      <i class="fa-sharp fa-solid fa-trash"></i>
      </a>
      </td>
      </tr>
      @empty
      <tr>
      <td colspan="3">No records found</td>
      </tr>
      @endforelse
      </tbody>
      </table>
      <div class="pagn-links">
         {{$roles->links()}}
      </div>
      </div>
      </div>
      </div>
      </div>
      @endsection

      @section('scripts')
      @if (session('status'))
      <script type="text/javascript">
      iziToast.show({
      titleColor:'white',
      messageColor: 'white',
      icon:'fa-regular fa-circle-check',
      iconColor: 'white',
      backgroundColor: '#17c1e8',
      message:"{{session('status')}}",
      position: 'topRight'
      });
      </script>
 @endif
 <script type="text/javascript">
   function confirm(){

   }
 </script>
@endsection
