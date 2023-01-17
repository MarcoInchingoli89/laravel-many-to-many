@extends('layouts.admin')

@section('content')
    @include('partials.errors')
    <form action="{{ route('admin.projects.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
                placeholder="Insert text" aria-describedby="helpId" value="{{ old('title') }}" required>
            <small id="helpId" class="text-muted">Insert a title project</small>
        </div>
        <div class="mb-3">
            <label for="cover_image" class="form-label">Cover Image</label>
            <input type="file" name="cover_image" id="cover_image"
                class="form-control @error('cover_image') is-invalid @enderror" placeholder=""
                aria-describedby="coverImageHelper">
            <small id="coverImageHelper" class="text-muted">Add your cover image</small>
        </div>
        <div class="mb-3">
            <label for="type_id" class="form-label">Types</label>
            <select class="form-select form-select @error('type_id') 'is-invalid' @enderror" name="type_id" id="type_id">
                <option selected>Select one</option>

                @foreach ($types as $type)
                    <option value="{{ $type->id }}" {{ old('type_id') ? 'selected' : '' }}>{{ $type->name }}</option>
                @endforeach

            </select>
            <small id="typesHelper" class="text-muted">Select a project type</small>
        </div>
        <div class="mb-3">
            <div class="mb-3">
                <label for="technologies" class="form-label">Technologies</label>
                <select multiple class="form-select form-select" name="technologies[]" id="technologies">
                    <option value="" disabled>Select a technology</option>
                    @forelse ($technologies as $technology)
                        @if ($errors->any())
                            <option value="{{ $technology->id }}"
                                {{ in_array($technology->id, old('technologies', [])) ? 'selected' : '' }}>
                                {{ $technology->name }}</option>
                        @else
                            <option value="{{ $technology->id }}">{{ $technology->name }}</option>
                        @endif
                    @empty
                        <option value="" disabled>Sorry 😥 no technologies in the system</option>
                    @endforelse
                </select>
                <small id="technologiesHelper" class="text-muted">Left click on mouse to select, for multiple selection left
                    click + Ctrl on options, deselect an option with left click + Ctrl to an option</small>
            </div>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" name="description" id="description"
                class="form-control @error('description') is-invalid @enderror" placeholder="Insert text"
                aria-describedby="helpId" value="{{ old('description') }}">
            <small id="helpId" class="text-muted">Insert project description</small>
        </div>

        <button type="submit" class="btn btn-dark">Add Project</button>
    </form>
@endsection
