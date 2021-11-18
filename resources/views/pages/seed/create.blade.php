@extends('layouts.app')

@push('styles')
@endpush

@section('content')
<!-- Start Content-->
<div class="container-fluid">
    <form action="{{ route('seed.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Create Bibit</h4>
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
                                    <label for="title" class="form-label">Nama</label>
                                    <input class="form-control" id="title" type="text" name="title" value="{{ old('title') }}">
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
