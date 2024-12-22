@extends('dashboard.layouts.app')

@section('title')
Your Courses - Instructor Dashboard
@endsection

@section('content')
<div class="home-bg min-vh-100 pt-3">
    <div class="container pt-5">
        <h1 class="text-center mt-5 mb-3 text-shadow">Your Courses</h1>
        <div class="text-end">
            <a href="{{route('instructor.courses.new')}}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> New Course</a>
        </div>
        <div class="mb-5 mt-3">
            <form action="{{route('instructor.courses.index')}}" method="GET" class="d-flex">
                @csrf
                <input type="text" class="form-control search-input ms-3" name="name" placeholder="Search by Name" value="{{request()->query('name') ?? ''}}">
                <input type="text" class="form-control search-input ms-3" name="sku" placeholder="Search by SKU" value="{{request()->query('SKU') ?? ''}}">
                <button type="submit" class="btn btn-primary ms-3"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
        <div class="table-responsive" id="orders">
            <table class="table table-bordered bg-dark">
                <thead>
                    <tr>
                        <th class="bg-primary text-white">Course Name</th>
                        <th class="bg-primary text-white">Instructor Name</th>
                        <th class="bg-primary text-white">SKU</th>
                        <th class="bg-primary text-white">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($items as $item)
                    <tr>
                        <td class="bg-dark text-white">{{ $item->name }}</td>
                        <td class="bg-dark text-white">{{ $item->user->name }}</td>
                        <td class="bg-dark text-white">{{ $item->SKU }}</td>
                        <td class="bg-dark text-white">
                            <!-- <a href="#" class="btn btn-primary me-2"><i class="fa-solid fa-eye"></i> View</a> -->
                            <a href="{{route('instructor.courses.show', $item)}}" class="btn btn-primary me-2"><i class="fa-solid fa-eye"></i> View</a>
                            <a href="{{route('instructor.courses.edit', $item)}}" class="btn btn-primary me-2"><i class="fa-solid fa-pen"></i> Edit</a>
                            <a href="{{route('instructor.courses.destroy', $item)}}" class="btn btn-danger btn-del"><i class="fa-solid fa-trash"></i> Delete</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="bg-dark text-white" colspan="5">No courses found</td>
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