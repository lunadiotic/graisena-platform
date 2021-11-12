@extends('layouts.app')

@push('styles')
@endpush

@section('content')
<!-- Start Content-->
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                </div>
                <h4 class="page-title">Detail: {{ $data->title }}</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Stock</h4>
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <th scope="row" style="width: 15%">Partner</th>
                                    <td style="width: 5%">:</td>
                                    <td>{{ $data->partner }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Nama Kegiatan</th>
                                    <td>:</td>
                                    <td>{{ $data->name_activity }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Lokasi</th>
                                    <td>:</td>
                                    <td>{{ $data->location }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Jenis Bibit</th>
                                    <td>:</td>
                                    <td>{{ $data->type_seed }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Total Bibit</th>
                                    <td>:</td>
                                    <td>{{ $data->total_seed }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row-->
</div> <!-- container -->
@endsection

@push('scripts')
@endpush
