@extends('dashboard.layouts.app')
@section('title')
Users - Admin Dashboard
@endsection

@section('content')
<div class="home-bg min-vh-100 pt-3">
    <div class="container pt-5">
        <h1 class="text-center mt-5 text-shadow">Users</h1>
        <div class="my-5">
            <form action="{{route('admin.users.index')}}" method="GET" class="d-flex">
                @csrf
                <input type="text" class="form-control search-input" name="name" placeholder="Search by name" value="{{request()->query('name') ?? ''}}">
                <input type="email" class="form-control search-input ms-3" name="email" placeholder="Search by email" value="{{request()->query('email') ?? ''}}">
                <input type="text" class="form-control search-input ms-3" name="address" placeholder="Search by address" value="{{request()->query('address') ?? ''}}">
                <input type="tel" class="form-control search-input ms-3" name="phone" placeholder="Search by phone" value="{{request()->query('phone') ?? ''}}">
                <select name="role" id="role" class="form-select search-input ms-3">
                    <option value="">All</option>
                    <option value="vendor">Vendor</option>
                    <option value="instructor">Instructor</option>
                    <option value="user">User</option>
                </select>
                <button type="submit" class="btn btn-primary ms-3"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
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
                <tfoot>
                    <tr>
                        <th class="bg-primary text-white pgn" colspan="5">{{$users->links()}}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection