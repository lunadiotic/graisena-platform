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
                    <div class="page-title-right">
                        <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                    </div>
                    <h4 class="page-title">Create Distribution</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Form</h4>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="name_activity" class="form-label">Nama Kegiatan</label>
                                    <input class="form-control" id="name_activity" type="name_activity" name="name_activity" value="{{ old('name_activity') }}">
                                    <input type="hidden" name="nursary_id" value="{{ $data->id }}">
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="location" class="form-label">Lokasi</label>
                                    <input type="text" id="location" class="form-control" name="location" value="{{ old('location') }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="partner" class="form-label">Partner</label>
                                    <input type="text" id="partner" class="form-control" name="partner" value="{{ old('partner') }}">
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row-->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="total_seed" class="form-label">Total Bibit</label>
                                    <input type="number" id="total_seed" class="form-control" name="total_seed" value="{{ old('total_seed') }}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="type_seed" class="form-label">Tipe Bibit</label>
                                    <input type="text" id="type_seed" class="form-control" name="type_seed" value="{{ old('type_seed') }}">
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

{{-- @push('scripts')
<script>
    $('#total_dead_seeds').change(function() {
        let broken = $('#total_broken_seeds').val();
        let health = $('#total_healthly_seeds').val();
        let dead = $('#total_dead_seeds').val();
        let total = broken + health + dead;
        $('#total_seeds').val(total)
    })
</script>
@endpush --}}
