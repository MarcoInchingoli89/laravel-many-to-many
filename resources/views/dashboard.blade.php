@extends('layouts.admin')

@section('name')
    Dashboard
@endsection
@section('content')
    <a class="btn btn-dark btn-lg" href="{{ route('admin.projects.create') }}" role="button">Create New Project</a>
@endsection
