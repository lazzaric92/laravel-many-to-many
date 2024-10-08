@extends('layouts.admin')

@section('page-title', 'Projects Index')

@section('content')
    <div class="container">
        <h1 class="text-center text-white fw-bold mb-4">Projects</h1>

        @if (session('message'))
            <div class="alert alert-danger">
                {{session('message')}}
            </div>
        @endif

        <table class="table table-hover table-striped text-center mb-4">
            <thead class="table-primary">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Type</th>
                    <th scope="col">Author</th>
                    <th scope="col">Title</th>
                    <th scope="col">Technologies</th>
                    <th scope="col">Date</th>
                    <th scope="col">Add. devs</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td> {{$project->id}} </td>
                        <td>
                            @if ($project->type)
                                <span class="badge p-2" style="background-color: {{$project->type->color}}">
                                    <a class="text-white text-uppercase fw-bold text-decoration-none" href="{{route('admin.types.show', $project->type)}}">{{$project->type->name}}</a>
                                </span>
                            @else
                                ----
                            @endif
                        </td>
                        <td> {{$project->user->name}} </td>
                        <td> <strong>{{$project->title}}</strong> </td>
                        <td>
                            @forelse ($project->technologies as $technology)
                                <span class="badge rounded-pill p-2 mb-1" style="background-color: {{$technology->color}}">
                                    {{$technology->name}}
                                    {{-- <a class="text-white text-uppercase fw-bold text-decoration-none" href="{{route('admin.types.show', $project->type)}}">{{$technology->name}}</a> --}}
                                </span>
                            @empty
                                ----
                            @endforelse
                        </td>
                        <td> {{$project->date}} </td>
                        <td>
                            @if ($project->add_devs)
                                {{$project->add_devs}}
                            @endif
                        </td>
                        <td>
                            <a href=" {{route('admin.projects.show', $project)}} " class="btn btn-info btn-sm ms-1 mb-1">Info</a>
                            <a href="{{route('admin.projects.edit', $project)}}" class="btn btn-warning btn-sm ms-1 mb-1">Edit</a>
                            <form action="{{route('admin.projects.destroy', $project)}}" method="POST" class="d-inline-block delete-form" data-name="{{$project->title}}">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-secondary btn-sm ms-1" value="Delete">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $projects->links() }}
    </div>
@endsection

@section('custom-script')
    @vite('resources/js/confirm-action/confirm-delete.js')
@endsection
