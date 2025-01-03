@extends('dashboard.layouts.app')
@section('title')
Vendor Dashboard
@endsection

@section('content')
<div class="home-bg">
    <div class="container pt-5">
        <h1 class="text-center mt-5 text-shadow">Vendor Dashboard</h1>
        <div class="row gap-4 mt-5 justify-content-center">
            <a href="{{route('vendor.products.index')}}" class="col-auto shadow rounded py-4 px-5 mb-3 text-center text-decoration-none db-btn">
                <h3 class="font-semibold text-shadow">Your Products</h3>
            </a>
            <a href="{{route('vendor.orders.index')}}" class="col-auto shadow rounded py-4 px-5 mb-3 text-center text-decoration-none db-btn">
                <h3 class="font-semibold text-shadow">Total Orders</h3>
            </a>
        </div>
        <h1 class="text-center mt-5 text-shadow mb-3">Send an Email</h1>
        <div class="row justify-content-center pb-5">
            <div class="col-md-6">
                <h3 class="text-center text-shadow">Contacts</h3>
                <table class="table table-bordered bg-dark mt-3">
                    <thead>
                        <tr>
                            <th class="bg-primary text-white">Name</th>
                            <th class="bg-primary text-white">Email</th>
                            <th class="bg-primary text-white">Send</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td class="bg-dark text-white">{{$user->name}}</td>
                            <td class="bg-dark text-white">{{$user->email}}</td>
                            <td class="bg-dark text-white">
                                <a href="mailto:{{$user->email}}" class="btn btn-primary">Send</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th class="bg-primary text-white pgn" colspan="5">{{$users->links()}}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="col-md-6">
                <h3 class="text-center text-shadow">Compose</h3>
                <form action="{{route('vendor.contact')}}" method="POST" class="compose-box mt-3" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control input" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" class="form-control input" id="subject" name="subject" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control input" id="message" name="message" rows="4" required></textarea>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection