@extends('layouts.app')

@push('styles')
@endpush

@section('content')
<!-- Start Content-->
<div class="container-fluid">
<form action="{{ route('distribution.seed.update', ['distribution_seed'=>$distribution->id]) }}" method="POST" enctype="multipart/form-data">
        @method('PATCH') @csrf
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Edit Distribution Seed</h4>
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
                                    <label for="seed" class="form-label">Nama Bibit</label>
                                    <select id="seed" name="seed_id" class="form-control">
                                        <option selected>Choose...</option>
                                        @foreach ($seed as $item)
                                        <option value="{{ $item->id }}" {{ $distribution->seed_id == $item->id ? 'selected' : ''}}>{{$item->title}}</option>
                                        @endforeach
                                    </select>
                                    <input type="hidden" name="distribution_id" value="{{ $distribution->distribution_id }}">
                                </div>
                            </div> <!-- end col -->
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="total" class="form-label">Total</label>
                                    <input type="text" id="total" class="form-control" name="total" value="{{ old('total', $distribution->total) }}">
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
