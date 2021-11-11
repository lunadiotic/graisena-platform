@extends('layouts.app')

@push('styles')
@endpush

@section('content')
<!-- Start Content-->
<div class="container-fluid">
<form action="{{ route('stock.update', $data->id) }}" method="POST" enctype="multipart/form-data">
        @method('PATCH') @csrf
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                    </div>
                    <h4 class="page-title">Edit Program</h4>
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
                                    <label for="date" class="form-label">Tanggal</label>
                                    <input class="form-control" id="date" type="date" name="date" value="{{ old('date', $data->date->toDateString()) }}">
                                    <input type="hidden" name="nursary_id" value="{{ $data->nursary_id }}">
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="plant_type" class="form-label">Jenis Tumbuhan</label>
                                    <input type="text" id="plant_type" class="form-control" name="plant_type" value="{{ old('plant_type', $data->plant_type) }}">
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row-->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="total_healthly_seeds" class="form-label">Total Bibit Sehat</label>
                                    <input type="number" id="total_healthly_seeds" class="form-control" name="total_healthly_seeds" value="{{ old('total_healthly_seeds', $data->total_healthly_seeds) }}">
                                </div>
                                <div class="mb-3">
                                    <label for="total_broken_seeds" class="form-label">Total Bibit Rusak</label>
                                    <input type="number" id="total_broken_seeds" class="form-control" name="total_broken_seeds" value="{{ old('total_broken_seeds', $data->total_broken_seeds) }}">
                                </div>
                            </div> <!-- end col -->

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="total_dead_seeds" class="form-label">Total Bibit Mati</label>
                                    <input type="number" id="total_dead_seeds" class="form-control" name="total_dead_seeds" value="{{ old('total_dead_seeds', $data->total_dead_seeds) }}">
                                </div>
                                <div class="mb-3">
                                    <label for="total_seeds" class="form-label">Total Bibit</label>
                                    <input type="number" id="total_seeds" class="form-control" name="total_seeds" value="{{ old('total_seeds', $data->total_seeds) }}">
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
                                Update
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
    $('#used').change(function() {
        let balance = $('#budget').val() - $('#used').val();
        $('#balance').val(balance)
    })
</script>
@endpush --}}
