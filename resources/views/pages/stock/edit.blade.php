@extends('layouts.app')

@push('styles')
@endpush

@section('content')
<!-- Start Content-->
<div class="container-fluid">
<form action="{{ route('stock.update', $stock->id) }}" method="POST" enctype="multipart/form-data">
        @method('PATCH') @csrf
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Edit Stock</h4>
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
                                <a href="{{ url()->previous() }}" class="btn btn-sm btn-primary" style="margin-top: -6px;">Back</a>
                            </span>
                        </h4>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="date" class="form-label">Tanggal</label>
                                    <input class="form-control" id="date" type="date" name="date_check" value="{{ old('date', $stock->date_check->toDateString()) }}">
                                    <input type="hidden" name="nursary_id" value="{{ $stock->nursary_id }}">
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="seed">Nama Bibit</label>
                                        <select id="seed" name="seed_id" class="form-control">
                                            @foreach ($seed as $item)
                                            <option value="{{ $item->id }}" {{ $stock->seed_id == $item->id ? 'selected' : ''}}>{{$item->title}}</option>
                                            @endforeach
                                        </select>
                                </div>
                            </div> <!-- end col -->
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="seed_out" class="form-label">Bibit Keluar</label>
                                    <input type="number" id="seed_out" class="form-control" name="seed_out" value="{{ old('seed_out', $stock->seed_out) }}">
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row-->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="seed_good" class="form-label">Bibit Sehat</label>
                                    <input type="number" id="seed_good" class="form-control" name="seed_good" value="{{ old('seed_good', $stock->seed_good) }}">
                                </div>
                                <div class="mb-3">
                                    <label for="seed_broken" class="form-label">Total Bibit Rusak</label>
                                    <input type="number" id="seed_broken" class="form-control" name="seed_broken" value="{{ old('seed_broken', $stock->seed_broken) }}">
                                </div>
                            </div> <!-- end col -->

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="seed_death" class="form-label">Total Bibit Mati</label>
                                    <input type="number" id="seed_death" class="form-control" name="seed_death" value="{{ old('seed_death', $stock->seed_death) }}">
                                </div>
                                <div class="mb-3">
                                    <label for="total_seed" class="form-label">Total Bibit</label>
                                    <input type="number" id="total_seed" class="form-control" name="total_seed" value="{{ old('total_seed', $stock->total_seed) }}" readonly>
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
@push('scripts')
<script>
    $('#seed_broken').change(function() {
        let good = $('#seed_good').val();
        let out = $('#seed_out').val();
        let death = $('#seed_death').val();
        let broken = $('#seed_broken').val();
        let total = parseInt(good) + parseInt(broken) + parseInt(death) - parseInt(out);
        $('#total_seed').val(total)
    })
</script>
@endpush
