@extends('layouts.app')

@push('styles')
@endpush

@section('content')
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Laporan Nursery: {{ $data->title }}</h4>
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
                                            <td>{{ $data->title }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Nama Pengelola</th>
                                            <td>:</td>
                                            <td>{{ $data->manager }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- end col -->
                    </div>

                    <hr style="border: 2px solid black;">

                    @php
                        $stocks = $data->stocks()->distinct()->get(['seed_id']);
                    @endphp

                    @foreach($stocks as $stock)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-borderless mb-0">
                                        <tbody>
                                            <tr>
                                                <th scope="row" style="width: 24%">Nama Bibit</th>
                                                <td style="width: 8%">:</td>
                                                <td>{{ $stock->seed->title  }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- end col -->
                        </div>

                        @php
                            $seeds = $data->stocks()->where('seed_id', $stock->seed->id)->get()
                        @endphp

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
                                        @foreach ($seeds as $item)
                                        <tbody>
                                            <tr>
                                                <td>{{ $item->date_check->toDateString() }}</td>
                                                <td>{{ $item->seed_out }}</td>
                                                <td>{{ $item->seed_good }}</td>
                                                <td>{{ $item->seed_death }}</td>
                                                <td>{{ $item->seed_broken }}</td>
                                                <td>{{ $item->total_seed }}</td>
                                            </tr>
                                        </tbody>
                                        @endforeach
                                    </table>
                                </div> <!-- end table-responsive -->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
                    @endforeach

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
