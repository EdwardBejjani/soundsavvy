@extends('dashboard.layouts.app')

@section('title')
Your Products - Vendor Dashboard
@endsection

@section('content')
<div class="home-bg min-vh-100 pt-3">
    <div class="container pt-5">
        <h1 class="text-center mt-5 mb-3 text-shadow">Your Products</h1>
        <div class="text-end">
            <a href="{{route('vendor.products.new')}}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> New Product</a>
        </div>
        <div class="mb-5 mt-3">
            <form action="{{route('vendor.products.index')}}" method="GET" class="d-flex">
                @csrf
                <input type="text" class="form-control search-input" name="id" placeholder="Search by Product ID" value="{{request()->query('id') ?? ''}}">
                <input type="text" class="form-control search-input ms-3" name="user_id" placeholder="Search by Vendor ID" value="{{request()->query('user_id') ?? ''}}">
                <input type="text" class="form-control search-input ms-3" name="name" placeholder="Search by Name" value="{{request()->query('name') ?? ''}}">
                <input type="text" class="form-control search-input ms-3" name="sku" placeholder="Search by SKU" value="{{request()->query('SKU') ?? ''}}">
                <button type="submit" class="btn btn-primary ms-3"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
        <div class="table-responsive" id="orders">
            <table class="table table-bordered bg-dark">
                <thead>
                    <tr>
                        <th class="bg-primary text-white">Product ID</th>
                        <th class="bg-primary text-white">Vendor ID</th>
                        <th class="bg-primary text-white">Name</th>
                        <th class="bg-primary text-white">SKU</th>
                        <th class="bg-primary text-white">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                    <tr>
                        <td class="bg-dark text-white">{{ $item->id }}</td>
                        <td class="bg-dark text-white">{{ $item->user_id }}</td>
                        <td class="bg-dark text-white">{{ $item->name }}</td>
                        <td class="bg-dark text-white">{{ $item->SKU }}</td>
                        <td class="bg-dark text-white">
                            <!-- <a href="#" class="btn btn-primary me-2"><i class="fa-solid fa-eye"></i> View</a> -->
                            <a href="{{route('vendor.products.show', $item)}}" class="btn btn-primary me-2"><i class="fa-solid fa-eye"></i> View</a>
                            <a href="{{route('vendor.products.edit', $item)}}" class="btn btn-primary me-2"><i class="fa-solid fa-pen"></i> Edit</a>
                            <a href="#" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Delete</a>
                        </td>
                    </tr>
                    @endforeach
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