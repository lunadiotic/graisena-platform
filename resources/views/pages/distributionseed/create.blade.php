@extends('layouts.app')

@push('styles')
@endpush

@section('content')
<!-- Start Content-->
<div class="container-fluid">
    <form action="{{ route('distribution.seed.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="distribution_id" value="{{ $distribution->id }}">
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
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="seed" class="form-label">Nama Bibit</label>
                                    <select id="seed" name="seed_id"
                                        class="form-control @error('seed_id') is-invalid @enderror">
                                        <option selected>Choose...</option>
                                        @foreach ($seed as $item)
                                        <option value="{{ $item->id }}">{{$item->title}}</option>
                                        @endforeach
                                    </select>
                                    @error('seed_id')
                                    <span class="text-danger" role="alert">
                                        <small><strong>{{ $message }}</strong></small>
                                    </span>
                                    @enderror
                                </div>
                            </div> <!-- end col -->
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="total" class="form-label">Total</label>
                                    <input type="number" id="total"
                                        class="form-control @error('total') is-invalid @enderror" name="total"
                                        value="{{ old('total') }}">
                                    @error('total')
                                    <span class="text-danger" role="alert">
                                        <small><strong>{{ $message }}</strong></small>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
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
