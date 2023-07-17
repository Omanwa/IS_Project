@extends('layout')


@section('headTitle','Complaints - ')
@section('pageTitle','Complaints')


@section('content')
<div class="row">
    <div class='col-12'>


        <div class="d-flex justify-content-end">
            <a class="btn btn-primary" href="{{URL::to('complaint/add')}}">
                <i class="fas fa-plus"></i> Add Complaints
            </a>
        </div>
        <div class="card mb-4">


            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7">complaintid</th>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7">buyerid</th>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7">description</th>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7">status</th>
                                <th class="align-middle text-center text-uppercase text-secondary text-s font-weight-bolder opacity-7">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($complaints as $complaint)
                            <tr>
                                <td><p class="text-s px-3 mb-0">{{$complaint->complaint_id}}</p></td>
                                <td><p class="text-s px-3 mb-0">{{$complaint->buyer_id}}</p></td>
                                <td><p class="text-s px-3 mb-0">{{$complaint->description}}</p></td>
                                <td><p class="text-s px-3 mb-0">{{$complaint->status}}</p></td>
                                <td class="align-middle text-center text-sm">
                                    <a href="{{URL::to('complaint/edit/'.$complaint->complaint_id)}}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a onclick= "return confirm('Are you sure?')" href="{{URL::to('complaint/delete/'.$complaint->complaint_id)}}">
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
                        {{$complaints->links()}}
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
