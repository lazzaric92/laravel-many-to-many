@extends('layouts.admin')

@section('head-cdn')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <div class="container">
        <div>
            <a href="@yield('back-arrow-href-route')" class="text-white text-tranform-none"><i class="fa-solid fa-left-long fs-2"></i></a>
        </div>

        <div class="row justify-content-center">
            <h1 class="text-center text-white mb-2 p-3 pt-0">@yield('page-title')</h1>

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
                        <option disabled selected>-- Select a type --</option>
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
                    <label for="technologies" class="form-label text-white">Technologies</label>
                    <div class="btn-group d-flex flex-wrap" role="group" aria-label="Basic checkbox toggle button group">
                        @foreach ($technologies as $technology)
                            @if ($errors->any())
                                <input type="checkbox" name="technologies[]" class="btn-check" id="technology-check-{{$technology->id}}" autocomplete="off" value="{{$technology->id}}" {{in_array($technology->id, old('technologies', [])) ? 'checked' : ''}} >
                                <label class="btn btn-outline-light my-2 mx-1 rounded" for="technology-check-{{$technology->id}}">{{$technology->name}}</label>
                            @else
                                <input type="checkbox" name="technologies[]" class="btn-check" id="technology-check-{{$technology->id}}" autocomplete="off" value="{{$technology->id}}" {{$project->technologies->contains($technology) ? 'checked' : ''}} >
                                <label class="btn btn-outline-light my-2 mx-1 rounded" for="technology-check-{{$technology->id}}">{{$technology->name}}</label>
                            @endif
                        @endforeach
                    </div>
                    @error('technologies')
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
