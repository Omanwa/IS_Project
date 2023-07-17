@extends('layout')


@section('headTitle','Payments - ')
@section('pageTitle','Payments')


@section('content')
<div class="row">
    <div class='col-12'>


        <div class="d-flex justify-content-end">
            <a class="btn btn-primary" href="{{URL::to('payment/add')}}">
                <i class="fas fa-plus"></i>Add Payments
            </a>
        </div>
        <div class="card mb-4">


            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7">buyer_id</th>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7">item_id</th>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7">amount</th>
                                <th class="text-uppercase text-secondary text-s font-weight-bolder opacity-7">status</th>
                                <th class="align-middle text-center text-uppercase text-secondary text-s font-weight-bolder opacity-7">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($payments as $payment)
                            <tr>
                                <td><p class="text-s px-3 mb-0">{{$payment->buyer_id}}</p></td>
                                <td><p class="text-s px-3 mb-0">{{$payment->item_id}}</p></td>
                                <td><p class="text-s px-3 mb-0">{{$payment->amount}}</p></td>
                                <td><p class="text-s px-3 mb-0">{{$payment->status}}</p></td>
                                <td class="align-middle text-center text-sm">
                                    
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
                        {{$payments->links()}}
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
