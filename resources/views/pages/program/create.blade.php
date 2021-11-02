@extends('layouts.app')

@push('styles')
@endpush

@section('content')
<!-- Start Content-->
<div class="container-fluid">
    <form action="{{ route('program.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                    </div>
                    <h4 class="page-title">Create Program</h4>
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
                                    <input class="form-control" id="date" type="date" name="date" value="{{ old('date') }}">
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Judul Program</label>
                                    <input type="text" id="title" class="form-control" name="title" value="{{ old('title') }}">
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Deskripsi</label>
                                    <textarea class="form-control" id="description" rows="5" name="description">{{ old('description') }}</textarea>
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row-->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="budget" class="form-label">Anggaran</label>
                                    <input type="number" id="budget" class="form-control" name="budget" value="{{ old('budget') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="balance" class="form-label">Sisa</label>
                                    <input type="text" id="balance" class="form-control" name="balance" value="{{ old('balance') }}" readonly>
                                </div>
                            </div> <!-- end col -->

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="used" class="form-label">Terpakai</label>
                                    <input type="number" id="used" class="form-control" name="used" value="{{ old('used') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="file_upload" class="form-label">Lampiran</label>
                                    <input type="file" id="file_upload" class="form-control" name="file_upload">
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
                        <h4 class="header-title">Data Peserta</h4>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="total-male" class="form-label">Jumlah Laki-laki</label>
                                    <input class="form-control" id="total-male" type="number" name="total_male" value="{{ old('total_male') }}">
                                </div>
                            </div> <!-- end col -->
                            <div class="col-lg-3">
                                <div class="mb-3">
                                    <label for="total-female" class="form-label">Jumlah Perempuan</label>
                                    <input class="form-control" id="total-female" type="number" name="total_female" value="{{ old('total_female') }}">
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="range-age-1" class="form-label">10-15</label>
                                    <input class="form-control" id="range-age-1" type="number" name="range_age_1" value="{{ old('range_age_1') }}">
                                </div>
                            </div> <!-- end col -->
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="range-age-2" class="form-label">16-20</label>
                                    <input class="form-control" id="range-age-2" type="number" name="range_age_2" value="{{ old('range_age_2') }}">
                                </div>
                            </div> <!-- end col -->
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="range-age-3" class="form-label">21-30</label>
                                    <input class="form-control" id="range-age-3" type="number" name="range_age_3" value="{{ old('range_age_3') }}">
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row-->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="range-age-4" class="form-label">31-50</label>
                                    <input class="form-control" id="range-age-4" type="number" name="range_age_4" value="{{ old('range_age_4') }}">
                                </div>
                            </div> <!-- end col -->
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="range-age-5" class="form-label">51-70</label>
                                    <input class="form-control" id="range-age-5" type="number" name="range_age_5" value="{{ old('range_age_5') }}">
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

@push('scripts')
<script>
    $('#used').change(function() {
        let balance = $('#budget').val() - $('#used').val();
        $('#balance').val(balance)
    })
</script>
@endpush
