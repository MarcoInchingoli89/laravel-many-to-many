@extends('layouts.admin')

@section('content')
    <div class="container py-5">
        @if ($project->cover_image)
            <img class="img-fluid" src="{{ asset('storage/' . $project->cover_image) }}" alt="">
        @else
            <div class="placeholder p-5 bg-secondary">Placeholder</div>
        @endif
        <h1>{{ $project->title }}</h1>

        <div class="type">
            <strong>Project Type:</strong>
            {{ $project->type ? $project->type->name : 'Uncategorized' }}
        </div>

        <div class="content">
            <strong>Description:</strong>
            {{ $project->description }}
        </div>



    </div>
@endsection
