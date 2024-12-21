@extends('dashboard.layouts.app')
@section('title')
Products - Admin Dashboard
@endsection
@section('content')
<div class="home-bg min-vh-100 pt-3">
    <div class="container pt-5">
        <h1 class="text-center mt-5 mb-5 text-shadow">Products</h1>
        <div class="mb-5 mt-3">
            <form action="{{route('admin.products.index')}}" method="GET" class="d-flex">
                @csrf
                <select name="user_id" id="user_id" class="form-select search-input ms-3">
                    <option value="">Search By Vendor Name</option>
                    @foreach ($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
                <input type="text" class="form-control search-input ms-3" name="name" placeholder="Search by Name" value="{{request()->query('name') ?? ''}}">
                <input type="text" class="form-control search-input ms-3" name="sku" placeholder="Search by SKU" value="{{request()->query('SKU') ?? ''}}">
                <button type="submit" class="btn btn-primary ms-3"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
        <div class="table-responsive" id="orders">
            <table class="table table-bordered bg-dark">
                <thead>
                    <tr>
                        <th class="bg-primary text-white">Vendor Name</th>
                        <th class="bg-primary text-white">Name</th>
                        <th class="bg-primary text-white">SKU</th>
                        <th class="bg-primary text-white">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($items as $item)
                    <tr>
                        <td class="bg-dark text-white">{{ $item->user->name }}</td>
                        <td class="bg-dark text-white">{{ $item->name }}</td>
                        <td class="bg-dark text-white">{{ $item->SKU }}</td>
                        <td class="bg-dark text-white">
                            <!-- <a href="#" class="btn btn-primary me-2"><i class="fa-solid fa-eye"></i> View</a> -->
                            <a href="{{route('admin.products.show', $item)}}" class="btn btn-primary me-2"><i class="fa-solid fa-eye"></i> View</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="bg-dark text-white" colspan="5">No Products Found</td>
                    </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr>
                        <th class="bg-primary text-white pgn" colspan="5">{{$items->links()}}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection