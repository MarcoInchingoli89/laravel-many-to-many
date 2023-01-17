@extends('layouts.admin')
@section('name')
    Projects
    <a class="text-white btn btn-dark" href="{{ route('admin.projects.create') }}">
        Add New Project
    </a>
@endsection
@section('content')
    <div class="p-5">
        @include('partials.message')
        <div class="table-responsive">
            <table class="table table-striped
    table-hover	
    table-borderless
    table-light
    align-middle">
                <thead class="table-dark">

                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Cover Image</th>
                        <th>Type</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @forelse($projects as $project)
                        <tr class="table-light">
                            <td scope="row" class="pe-3 fw-bold">{{ $project->id }}</td>
                            <td>{{ $project->title }}</td>
                            <td><img width="140" class="img-fluid" src="{{ asset('storage/' . $project->cover_image) }}"
                                    alt=""></td>
                            <td>{{ $project->type ? $project->type->name : 'Uncategorized' }}</td>
                            <td>{{ $project->description }}</td>
                            <td>
                                <a class="d-flex text-white p-2 my-2 bg-primary justify-content-center rounded-2"
                                    href="{{ route('admin.projects.show', $project->id) }}"><i
                                        class="fa-solid fa-eye"></i></a>
                                <a class="d-flex text-white p-2 my-2 bg-secondary justify-content-center rounded-2"
                                    href="{{ route('admin.projects.edit', $project->id) }}"><i
                                        class="fa-solid fa-pen-to-square"></i></a>
                                <!-- Modal trigger button -->
                                <button type="button"
                                    class="btn btn-danger d-flex text-white px-3 my-1 justify-content-center rounded-2"
                                    data-bs-toggle="modal" data-bs-target="#deleteProject-{{ $project->id }}">
                                    <i class="fa-solid fa-trash"></i>
                                </button>

                                <!-- Modal Body -->
                                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                @include('partials.projects-modal')
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
                <tfoot>

                </tfoot>
            </table>
        </div>
    </div>
@endsection
