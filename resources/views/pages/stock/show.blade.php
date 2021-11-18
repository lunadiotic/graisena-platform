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
                <h4 class="page-title">Detail: {{ $data->title }}</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title  d-flex justify-content-between">
                        <span>Stock</span>
                        <span>
                            <a href="{{ url()->previous() }}" class="btn btn-sm btn-primary" style="margin-top: -6px;">Back</a>
                        </span>
                    </h4>
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <th scope="row" style="width: 15%">Tanggal</th>
                                    <td style="width: 5%">:</td>
                                    <td>{{ $data->date_check->format('d/m/Y') }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Nama Bibit</th>
                                    <td>:</td>
                                    <td>{{ $data->seed->title }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Total Bibit</th>
                                    <td>:</td>
                                    <td>{{ $data->total_seed }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Bibit Rusak</th>
                                    <td>:</td>
                                    <td>{{ $data->seed_broken }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Bibit Sehat</th>
                                    <td>:</td>
                                    <td>{{ $data->seed_good }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Bibit Mati</th>
                                    <td>:</td>
                                    <td>{{ $data->seed_death }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Bibit Keluar</th>
                                    <td>:</td>
                                    <td>{{ $data->seed_out }}</td>
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
