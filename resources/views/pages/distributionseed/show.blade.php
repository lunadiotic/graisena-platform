@extends('layouts.app')

@push('styles')
@endpush

@section('content')
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Detail: {{ $data->distribution->title }}</h4>
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
                                            <th scope="row" style="width: 24%">Distribution</th>
                                            <td style="width: 8%">:</td>
                                            <td>{{ $distribution->title }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Lokasi</th>
                                            <td>:</td>
                                            <td>{{ $distribution->location }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Longitude</th>
                                            <td>:</td>
                                            <td>{{ $distribution->longitude }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Latitude</th>
                                            <td>:</td>
                                            <td>{{ $distribution->latitude }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- end col -->
                    </div>

                    <hr style="border: 2px solid black;">

                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-centered">
                                        <thead>
                                            <tr>
                                                <th>Nama Bibit</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td>{{ $data->seed->title }}</td>
                                                <td>{{ $data->total }}</td>
                                            </tr>
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
