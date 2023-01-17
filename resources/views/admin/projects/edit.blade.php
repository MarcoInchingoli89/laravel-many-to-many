@extends('layouts.admin')

@section('content')
    @include('partials.errors')
    <form action="{{ route('admin.projects.update', $project->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
                placeholder="Insert text" aria-describedby="helpId" value="{{ old('title', $project->title) }}" required>
            <small id="helpId" class="text-muted">Insert a title project</small>
        </div>
        <div class="mb-3 d-flex">
            <img width="140" class="img-fluid me-3" src="{{ asset('storage/' . $project->cover_image) }}" alt="">
            <div>
                <label for="cover_image" class="form-label">Replace Cover Image</label>
                <input type="file" name="cover_image" id="cover_image"
                    class="form-control @error('cover_image') is-invalid @enderror" placeholder=""
                    aria-describedby="coverImageHelper">
                <small id="coverImageHelper" class="text-muted">Replace your cover image</small>
            </div>
        </div>
        <div class="mb-3">
            <label for="type_id" class="form-label">Types</label>
            <select class="form-select form-select @error('type_id') 'is-invalid' @enderror" name="type_id" id="type_id">
                <option value="">Uncategorize</option>

                @forelse ($types as $type)
                    <option value="{{ $type->id }}"
                        {{ $type->id == old('type_id', $project->type ? $project->type->id : '') ? 'selected' : '' }}>
                        {{ $type->name }}
                    </option>
                @empty
                    <option value="">Sorry, no types in the system.</option>
                @endforelse

            </select>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" name="description" id="description"
                class="form-control @error('description') is-invalid @enderror" placeholder="Insert text"
                aria-describedby="helpId" value="{{ old('description', $project->description) }}">
            <small id="helpId" class="text-muted">Insert project description</small>
        </div>

        <button type="submit" class="btn btn-dark">Update Project</button>
    </form>
@endsection
