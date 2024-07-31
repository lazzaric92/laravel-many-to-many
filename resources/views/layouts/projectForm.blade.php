@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1 class="text-center text-white mb-2 p-3">@yield('page-title')</h1>

            <form action=" @yield('form-action') " class="@yield('form-classes', 'col-6')" method="POST" data-name="{{$project->title}}">
                @csrf
                @yield('form-method')

                <div class="mb-3">
                    <label for="title" class="form-label text-white">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{old('title', $project->title)}}">
                    @error('title')
                        <p class="mt-1 p-1 px-2 rounded">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="type_id" class="form-label text-white">Type</label>
                    <select class="form-select" aria-label="Default select example" name="type_id" id="type_id">
                        @foreach ($types as $type)
                            <option value="{{$type->id}}" {{($type->id == old('type_id', $project->type_id)) ? 'selected' : ''}}>{{$type->name}}</option>
                        @endforeach
                    </select>
                    @error('type_id')
                        <p class="mt-1 p-1 px-2 rounded">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="add_devs" class="form-label text-white">Additional Dev/s</label>
                    <input type="text" class="form-control" id="add_devs" name="add_devs" value="{{old('add_devs', $project->add_devs)}}">
                    @error('add_devs')
                        <p class="mt-1 p-1 px-2 rounded">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="languages" class="form-label text-white">Languages</label>
                    <input type="text" class="form-control" id="languages" name="languages" value="{{old('languages', $project->languages)}}">
                    @error('languages')
                        <p class="mt-1 p-1 px-2 rounded">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="date" class="form-label text-white">Date</label>
                    <input type="date" class="form-control" id="date" name="date" value="{{old('date', $project->date)}}">
                    @error('date')
                        <p class="mt-1 p-1 px-2 rounded">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="github" class="form-label text-white">Github url</label>
                    <input type="text" class="form-control" id="github" name="github" value="{{old('github', $project->github)}}">
                    @error('github')
                        <p class="mt-1 p-1 px-2 rounded">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label text-white">Image</label>
                    <input type="text" class="form-control" id="image" name="image" value="{{old('image', $project->image)}}">
                    @error('image')
                        <p class="mt-1 p-1 px-2 rounded">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label text-white">Description</label>
                    <textarea class="form-control" name="description" id="description" cols="80" rows="10" placeholder="Write your project description">{{old('description', $project->description)}}</textarea>
                    @error('description')
                        <p class="mt-1 p-1 px-2 rounded">{{$message}}</p>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn @yield('button-classes')">@yield('button-value')</button>
                    <input type="reset" value="Reset" class="btn btn-light">
                </div>
            </form>
        </div>
    </div>
@endsection
