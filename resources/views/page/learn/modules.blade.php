@extends('layouts.app')

@section('title', 'Modules')

@section('content')
<div class="mt-5 pt-5">
    <div class="container">
        <h1>{{ $item->name }}</h1>
        <div class="row">
            @forelse($modules as $module)
            <div class="col-md-4">
                <div class="card mb-4 btn-primary">
                    <div class="card-body">
                        <h5 class="card-title">{{ $module->title }}</h5>
                        <p class="card-text text-white">{{ $module->description }}</p>
                        <a href="{{ route('watch', ['item'=>$item, 'module'=>$module]) }}" class="btn btn-primary">View Module</a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-md-12">
                <div class="alert alert-warning" role="alert">
                    No modules found.
                </div>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection