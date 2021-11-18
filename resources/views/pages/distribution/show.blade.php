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
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title  d-flex justify-content-between">
                        <span>Distribution</span>
                        <span>
                            <a href="{{ url()->previous() }}" class="btn btn-sm btn-primary" style="margin-top: -6px;">Back</a>
                        </span>
                    </h4>
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <th scope="row">Nursary</th>
                                    <td>:</td>
                                    <td>{{ $distribution->nursary->title }}</td>
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
        <div class="col-8">
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
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    <!-- end row-->
</div> <!-- container -->
@endsection

@push('scripts')
@endpush
