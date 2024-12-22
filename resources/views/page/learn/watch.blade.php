@extends('layouts.app')

@section('title', 'Watch')

@section('content')
<div class="mt-5 pt-5">
    <div class="container">
        <h1>{{ $item->name }}</h1>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4 btn-primary">
                    <div class="card-body d-flex flex-column align-items-center">
                        <h5 class="card-title">{{ $module->title }}</h5>
                        <p class="card-text">{{ $module->description }}</p>
                        <iframe width="560" height="315" src="{{$module->link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection