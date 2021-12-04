@extends('layouts.app')

@push('styles')
@endpush

@section('content')
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Detail: {{ $data->seed->title }}</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-borderless mb-0" style="width: 100%">
                                    <tbody>
                                        <tr>
                                            <th scope="row" style="width: 24%">Nama Program</th>
                                            <td style="width: 8%">:</td>
                                            <td>{{ $nursery->title }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Nama Pengelola</th>
                                            <td>:</td>
                                            <td>{{ $nursery->manager }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- end col -->
                    </div>

                    <hr style="border: 2px solid black;">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-borderless mb-0">
                                        <tbody>
                                            <tr>
                                                <th scope="row" style="width: 24%">Nama Bibit</th>
                                                <td style="width: 8%">:</td>
                                                <td>{{ $data->seed->title  }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- end col -->
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-centered">
                                        <thead>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Bibit Keluar</th>
                                                <th>Bibit Sehat</th>
                                                <th>Bibit Mati</th>
                                                <th>Bibit Rusak</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td>{{ $data->date_check->toDateString() }}</td>
                                                <td>{{ $data->seed_out }}</td>
                                                <td>{{ $data->seed_good }}</td>
                                                <td>{{ $data->seed_death }}</td>
                                                <td>{{ $data->seed_broken }}</td>
                                                <td>{{ $data->total_seed }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div> <!-- end table-responsive -->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    <div class="mt-4 mb-1">
                        <div class="text-end d-print-none">
                            <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-printer me-1"></i> Print</a>
                        </div>
                    </div>
                </div>
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

</div> <!-- container -->
@endsection
