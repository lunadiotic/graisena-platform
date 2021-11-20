@extends('layouts.app')

@push('styles')
@endpush

@section('content')
<!-- Start Content-->
<div class="container-fluid">
    <form action="{{ route('distribution.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Create Distribution</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title  d-flex justify-content-between">
                            <span>Form</span>
                            <span>
                                <a href="{{ url()->previous() }}" class="btn btn-sm btn-primary"
                                    style="margin-top: -6px;">Back</a>
                            </span>
                        </h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="nursery_id" class="form-label">Nama Nursery</label>
                                    <select id="nursery_id" name="nursery_id"
                                        class="form-control @error('nursery_id') is-invalid @enderror">
                                        <option selected>Choose...</option>
                                        @foreach ($data as $item)
                                        <option value="{{ $item->id }}">{{$item->title}}</option>
                                        @endforeach
                                    </select>
                                    @error('nursery_id')
                                    <span class="text-danger" role="alert">
                                        <small><strong>{{ $message }}</strong></small>
                                    </span>
                                    @enderror
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Judul Program</label>
                                    <input type="text" id="title"
                                        class="form-control @error('title') is-invalid @enderror" name="title"
                                        value="{{ old('title') }}">
                                    @error('title')
                                    <span class="text-danger" role="alert">
                                        <small><strong>{{ $message }}</strong></small>
                                    </span>
                                    @enderror
                                </div>
                            </div> <!-- end col -->
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="location" class="form-label">Lokasi</label>
                                    <input type="text" id="location"
                                        class="form-control @error('location') is-invalid @enderror" name="location"
                                        value="{{ old('location') }}">
                                    @error('location')
                                    <span class="text-danger" role="alert">
                                        <small><strong>{{ $message }}</strong></small>
                                    </span>
                                    @enderror
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row-->
                        <div class="row">
                            <div class="col-lg-6">

                                <div class="mb-3">
                                    <label for="longitude" class="form-label">Longitude</label>
                                    <input type="text" id="longitude"
                                        class="form-control @error('longitude') is-invalid @enderror" name="longitude"
                                        value="{{ old('longitude') }}">
                                    @error('longitude')
                                    <span class="text-danger" role="alert">
                                        <small><strong>{{ $message }}</strong></small>
                                    </span>
                                    @enderror
                                </div>
                            </div> <!-- end col -->
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="latitude" class="form-label">Latitude</label>
                                    <input type="text" id="latitude"
                                        class="form-control @error('latitude') is-invalid @enderror" name="latitude"
                                        value="{{ old('latitude') }}">
                                    @error('latitude')
                                    <span class="text-danger" role="alert">
                                        <small><strong>{{ $message }}</strong></small>
                                    </span>
                                    @enderror
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row-->
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-end btn-group" role="group">
                            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">
                                Reset
                            </a>
                            <button type="submit" class="btn btn-outline-primary">
                                Save
                            </button>
                        </div>
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->
    </form>
</div> <!-- container -->
@endsection
