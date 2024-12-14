@extends('dashboard.layouts.app')
@section('title')Admin Dashboard@endsection
@section('content')
<div class="home-bg">
    <div class="container pt-5">
        <h1 class="text-center mt-5 text-shadow">Admin Dashboard</h1>
        <div class="row gap-4 mt-5 justify-content-center">
            <a href="{{route('admin.users.index')}}" class="col-auto shadow rounded pt-4 pb-2 px-5 mb-3 text-center text-decoration-none db-btn">
                <h3 class="font-semibold text-shadow">Total Users</h3>
                <p class="text-2xl mt-2 text-shadow count-up mb-1">59431</p>
            </a>
            <a href="{{route('admin.courses.index')}}" class="col-auto shadow rounded pt-4 pb-2 px-5 mb-3 text-center text-decoration-none db-btn">
                <h3 class="font-semibold text-shadow">Total Courses</h3>
                <p class="text-2xl mt-2 text-shadow count-up">54</p>
            </a>
            <a href="{{route('admin.orders.index')}}" class="col-auto shadow rounded pt-4 pb-2 px-5 mb-3 text-center text-decoration-none db-btn">
                <h3 class="font-semibold text-shadow">Total Orders</h3>
                <p class="text-2xl mt-2 text-shadow count-up  mb-1">5746</p>
            </a>
        </div>
        <h1 class="text-center mt-5 text-shadow mb-3">Send an Email</h1>
        <div class="row justify-content-center">
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
                <form action="#" method="POST" class="compose-box mt-3">
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