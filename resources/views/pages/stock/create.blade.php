@extends('layouts.app')

@push('styles')
@endpush

@section('content')
<!-- Start Content-->
<div class="container-fluid">
    <form action="{{ route('stock.store', $nursery->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Create Stock</h4>
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
                                    <label for="date_check" class="form-label">Tanggal Periksa</label>
                                    <input class="form-control @error('date_check') is-invalid @enderror"
                                        id="date_check" type="date" name="date_check" value="{{ old('date_check') }}">
                                    @error('date_check')
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
                                    <label for="seed_out" class="form-label">Bibit Keluar</label>
                                    <input type="number" id="seed_out"
                                        class="form-control @error('seed_out') is-invalid @enderror" name="seed_out"
                                        value="{{ old('seed_out') }}">
                                    @error('seed_out')
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
                                    <label for="seed_good" class="form-label">Bibit Sehat</label>
                                    <input type="number" id="seed_good"
                                        class="form-control @error('seed_good') is-invalid @enderror" name="seed_good"
                                        value="{{ old('seed_good') }}">
                                    @error('seed_good')
                                    <span class="text-danger" role="alert">
                                        <small><strong>{{ $message }}</strong></small>
                                    </span>
                                    @enderror
                                </div>
                            </div> <!-- end col -->
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="seed_broken" class="form-label">Bibit Rusak</label>
                                    <input type="number" id="seed_broken"
                                        class="form-control @error('seed_broken') is-invalid @enderror"
                                        name="seed_broken" value="{{ old('seed_broken') }}">
                                    @error('seed_broken')
                                    <span class="text-danger" role="alert">
                                        <small><strong>{{ $message }}</strong></small>
                                    </span>
                                    @enderror
                                </div>
                            </div> <!-- end col -->

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="seed_death" class="form-label">Bibit Mati</label>
                                    <input type="number" id="seed_death"
                                        class="form-control @error('seed_death') is-invalid @enderror" name="seed_death"
                                        value="{{ old('seed_death') }}">
                                    @error('seed_death')
                                    <span class="text-danger" role="alert">
                                        <small><strong>{{ $message }}</strong></small>
                                    </span>
                                    @enderror
                                </div>
                            </div> <!-- end col -->
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="total_seed" class="form-label">Total Bibit</label>
                                    <input type="number" id="total_seed"
                                        class="form-control @error('total_seed') is-invalid @enderror" name="total_seed"
                                        value="{{ old('total_seed') }}">
                                    @error('total_seed')
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

@push('scripts')
<script>
    $('#seed_broken').change(function() {
        let good = $('#seed_good').val();
        let out = $('#seed_out').val();
        let death = $('#seed_death').val();
        let broken = $('#seed_broken').val();
        let total = (parseInt(good) + parseInt(broken) + parseInt(death)) - parseInt(out);
        $('#total_seed').val(total)
    })
</script>
@endpush
