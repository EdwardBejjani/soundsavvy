@extends('dashboard.layouts.app')
@section('title')
Orders - Admin Dashboard
@endsection

@section('content')
<div class="home-bg min-vh-100 pt-3">
    <div class="container pt-5">
        <h1 class="text-center my-5 text-shadow">Courses</h1>
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
                    @foreach ($items as $item)
                    @if ($item->type == 'product')
                    @continue
                    @endif
                    <tr>
                        <td class=" bg-dark text-white">{{ $item->id }}</td>
                        <td class=" bg-dark text-white">{{ $item->user_id }}</td>
                        <td class=" bg-dark text-white">{{ $item->name }}</td>
                        <td class=" bg-dark text-white">{{ $item->SKU }}</td>
                        <td class=" bg-dark text-white">
                            <!-- <a href="#" class="btn btn-primary me-2"><i class="fa-solid fa-eye"></i> View</a> -->
                            <a href="{{route('admin.courses.show', $item)}}" class="btn btn-primary me-2"><i class="fa-solid fa-eye"></i> View</a>
                            <a href="{{route('admin.courses.edit', $item)}}" class="btn btn-primary me-2"><i class="fa-solid fa-pen"></i> Edit</a>
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