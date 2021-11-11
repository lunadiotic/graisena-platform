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
                                    <th scope="row" style="width: 15%">Tanggal</th>
                                    <td style="width: 5%">:</td>
                                    <td>{{ $data->date->format('d/m/Y') }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Jenis Tanaman</th>
                                    <td>:</td>
                                    <td>{{ $data->plant_type }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Total Bibit</th>
                                    <td>:</td>
                                    <td>{{ $data->total_seeds }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Total Bibit Rusak</th>
                                    <td>:</td>
                                    <td>{{ $data->total_broken_seeds }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Total Bibit Sehat</th>
                                    <td>:</td>
                                    <td>{{ $data->total_healthly_seeds }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Total Bibit Mati</th>
                                    <td>:</td>
                                    <td>{{ $data->total_dead_seeds }}</td>
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
