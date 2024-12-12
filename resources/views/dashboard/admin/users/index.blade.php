@extends('dashboard.layouts.app')
@section('title')
Users - Admin Dashboard
@endsection

@section('content')
<div class="home-bg min-vh-100 pt-3">
    <div class="container pt-5">
        <h1 class="text-center mt-5 text-shadow">Users</h1>
        <div class="row justify-content-center mt-3">
            <div class="col-md-6">
                <form action="{{route('admin.users.index')}}" method="GET">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control search-input" name="search" placeholder="Search for users by name or email" value="{{request()->query('search') ?? ''}}">
                        <div class="input-group-append">
                            <button class="btn btn-primary ms-3" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row gap-4 my-4 justify-content-center">
            <div class="col-auto shadow rounded py-3 px-5 mb-3 text-center text-decoration-none db-btn" onclick="filterUsers('vendor')">
                <h3 class="font-semibold text-shadow">Vendors</h3>
            </div>
            <div class="col-auto shadow rounded py-3 px-5 mb-3 text-center text-decoration-none db-btn" onclick="filterUsers('instructor')">
                <h3 class="font-semibold text-shadow">Instructors</h3>
            </div>
            <div class="col-auto shadow rounded py-3 px-5 mb-3 text-center text-decoration-none db-btn" onclick="filterUsers('user')">
                <h3 class="font-semibold text-shadow">Users</h3>
            </div>
        </div>
        <div class="table-responsive" id="users">
            <table class="table table-bordered bg-dark">
                <thead>
                    <tr>
                        <th class="bg-primary text-white">ID</th>
                        <th class="bg-primary text-white">Name</th>
                        <th class="bg-primary text-white">Role</th>
                        <th class="bg-primary text-white">Email</th>
                        <th class="bg-primary text-white">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    @if ($user->role == 'admin')
                    @continue
                    @endif
                    <tr>
                        <td class="bg-dark text-white">{{ $user->id }}</td>
                        <td class="bg-dark text-white">{{ $user->name }}</td>
                        <td class="bg-dark text-white">{{ $user->role }}</td>
                        <td class="bg-dark text-white">{{ $user->email }}</td>
                        <td class="bg-dark text-white">
                            <a href="{{route('admin.users.show', $user)}}" class="btn btn-primary me-2"><i class="fa-solid fa-eye"></i> View</a>
                            <a href="{{route('admin.users.edit', $user)}}" class="btn btn-primary me-2"><i class="fa-solid fa-pen"></i> Edit</a>
                            <a href="#" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection