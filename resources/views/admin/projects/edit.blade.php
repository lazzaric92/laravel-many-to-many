@extends('layouts.projectForm')

@section('back-arrow-href-route')
    {{route('admin.projects.show', $project)}}
@endsection

{{-- <--Title --}}
@section('page-title')
    Editing {{$project->title}}
@endsection

{{-- <-- Form --}}
@section('form-action')
    {{route('admin.projects.update', $project)}}
@endsection

@section('form-method')
    @method('PUT')
@endsection

@section('form-classes', 'col-6 edit-form')

{{-- <-- Button --}}
@section('button-classes', 'btn-warning')
@section('button-value', 'Edit')

{{-- <-- Script --}}
@section('custom-script')
    @vite('resources/js/projects/confirm-edit.js')
@endsection
