@extends('layouts.app')

@section('title',$title)

@section('content')
<h4 class="fw-bold text-decoration-underline text-center mb-4">@yield('title')</h4>
<div class="row">
    @foreach ($orders as $index => $order)
        <div class="col-lg-12 mb-5">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>Order #{{ ($index+1) }}</h5>
                    <h5>Status : {{ $order->status }}</h5>
                    <h5>Total : ${{ $order->total }}</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered text-center">
                        <thead>
                            <th>#</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </thead>
                        <tbody>
                            @foreach ($order->items as $index => $item)
                                <tr>
                                    <td>{{ ($index+1) }}</td>
                                    <td>{{ $item->product->title }}</td>
                                    <td>{{ $item->qty }}</td>
                                    <td>${{ $item->total }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    @if (auth()->user()->id == $order->user_id)
                        @if ($order->status == 'pending')
                            <a href="{{ route('changer_order',['order'=>$order,'status'=>'paid']) }}" class="btn btn-success btn-sm">Pay</a>
                            <a href="{{ route('changer_order',['order'=>$order,'status'=>'canceled']) }}" class="btn btn-danger btn-sm">Cancel</a>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    @endforeach
</div>
<div class="row">
    {{ $orders->links() }}
</div>

@endsection
