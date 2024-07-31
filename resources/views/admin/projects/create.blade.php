@extends('layouts.projectForm')

{{-- <--Title --}}
@section('page-title', 'Add project')

{{-- <-- Form --}}
@section('form-action', )
    {{ route('admin.projects.store')}}
@endsection

@section('form-classes', 'col-6 create-form')

{{-- <-- Button --}}
@section('button-classes', 'btn-info')
@section('button-value', 'Add')

{{-- <-- Script --}}
@section('custom-script')
    @vite('resources/js/projects/confirm-create.js')
@endsection
