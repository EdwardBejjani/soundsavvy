@extends('dashboard.layouts.app')
@section('title')
Orders - Vendor Dashboard
@endsection

@section('content')
<div class="home-bg min-vh-100 pt-3">
    <div class="container pt-5">
        <h1 class="text-center my-5 text-shadow">Orders</h1>
        <div class="table-responsive" id="orders">
            <table class="table table-bordered bg-dark">
                <thead>
                    <tr>
                        <th class="bg-primary text-white">Order ID</th>
                        <th class="bg-primary text-white">User ID</th>
                        <th class="bg-primary text-white">Status</th>
                        <th class="bg-primary text-white">Total Price</th>
                        <th class="bg-primary text-white">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        <td class=" bg-dark text-white">{{ $order->id }}</td>
                        <td class=" bg-dark text-white">{{ $order->user_id }}</td>
                        <td class=" bg-dark text-white">{{ $order->status }}</td>
                        <td class=" bg-dark text-white">{{ $order->total_price }}</td>
                        <td class=" bg-dark text-white">
                            <!-- <a href="#" class="btn btn-primary me-2"><i class="fa-solid fa-eye"></i> View</a> -->
                            <a href="{{route('vendor.orders.show', $order)}}" class="btn btn-primary me-2"><i class="fa-solid fa-eye"></i> View</a>
                            <a href="{{route('vendor.orders.refund', $order)}}" class="btn btn-danger me-2" onclick="return confirm('Are you sure you want to refund this order?')"><i class="fa-solid fa-arrow-rotate-left"></i> Refund</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th class="bg-primary text-white pgn" colspan="5">{{$orders->links()}}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection