@extends('dashboard.layouts.app')
@section('title')
Orders - Admin Dashboard
@endsection

@section('content')
<div class="home-bg min-vh-100 pt-3">
    <div class="container pt-5">
        <h1 class="text-center my-5 text-shadow">Courses</h1>
        <div class="my-5">
            <form action="{{route('admin.courses.index')}}" method="GET" class="d-flex">
                @csrf
                <input type="text" class="form-control search-input" name="id" placeholder="Search by Course ID" value="{{request()->query('id') ?? ''}}">
                <input type="text" class="form-control search-input ms-3" name="user_id" placeholder="Search by Tutor ID" value="{{request()->query('user_id') ?? ''}}">
                <input type="text" class="form-control search-input ms-3" name="name" placeholder="Search by Title" value="{{request()->query('name') ?? ''}}">
                <input type="text" class="form-control search-input ms-3" name="sku" placeholder="Search by SKU" value="{{request()->query('SKU') ?? ''}}">
                <button type="submit" class="btn btn-primary ms-3"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
        <div class="table-responsive" id="orders">
            <table class="table table-bordered bg-dark">
                <thead>
                    <tr>
                        <th class="bg-primary text-white">Course ID</th>
                        <th class="bg-primary text-white">Tutor ID</th>
                        <th class="bg-primary text-white">Title</th>
                        <th class="bg-primary text-white">SKU</th>
                        <th class="bg-primary text-white">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($items as $item)
                    <tr>
                        <td class="bg-dark text-white">{{ $item->id }}</td>
                        <td class="bg-dark text-white">{{ $item->user_id }}</td>
                        <td class="bg-dark text-white">{{ $item->name }}</td>
                        <td class="bg-dark text-white">{{ $item->SKU }}</td>
                        <td class="bg-dark text-white">
                            <!-- <a href="#" class="btn btn-primary me-2"><i class="fa-solid fa-eye"></i> View</a> -->
                            <a href="{{route('admin.courses.show', $item)}}" class="btn btn-primary me-2"><i class="fa-solid fa-eye"></i> View</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="bg-dark text-white" colspan="5">No Courses Found</td>
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