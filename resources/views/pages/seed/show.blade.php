@extends('layouts.app')

@push('styles')
@endpush

@section('content')
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Laporan Stok: {{ $data->title }}</h4>
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
                            <div class="mt-1">
                                <p><b>Bibit: {{ $data->title }}</b></p>
                            </div>

                        </div><!-- end col -->
                    </div>
                    <!-- end row -->

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
                                        @foreach ($data->stocks as $stock)
                                        <tr>
                                            <td>{{ $stock->date_check->toDateString() }}</td>
                                            <td>{{ $stock->seed_out }}</td>
                                            <td>{{ $stock->seed_good }}</td>
                                            <td>{{ $stock->seed_death }}</td>
                                            <td>{{ $stock->seed_broken }}</td>
                                            <td>{{ $stock->total_seed }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div> <!-- end table-responsive -->
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="mt-4 mb-1">
                        <div class="text-end d-print-none">
                            <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i
                                    class="mdi mdi-printer me-1"></i> Print</a>
                        </div>
                    </div>
                </div>
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

</div> <!-- container -->
@endsection
