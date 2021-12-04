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
                <h4 class="page-title">Detail: {{ $distribution->title }}</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title  d-flex justify-content-between">
                        <span>Distribution</span>
                    </h4>
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <th scope="row">Nursery</th>
                                    <td>:</td>
                                    <td>{{ $distribution->nursery->title }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Judul</th>
                                    <td>:</td>
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
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    <!-- end row-->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title  d-flex justify-content-between">
                        <span>Bibit</span>
                    </h4>
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <tbody>
                                @foreach ($seed->distribution_seeds as $item)
                                <tr>
                                    <th scope="row">{{ $item->seed->title }}</th>
                                    <td>:</td>
                                    <td>{{ $item->total }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4 mb-1">
                        <div class="text-end d-print-none">
                            <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-printer me-1"></i> Print</a>
                        </div>
                    </div>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    <!-- end row-->
</div> <!-- container -->
@endsection

@push('scripts')
@endpush
