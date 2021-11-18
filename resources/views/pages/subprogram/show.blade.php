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
                    <h4 class="header-title d-flex justify-content-between">
                        <span>Program</span>
                        <span>
                            <a href="{{ url()->previous() }}" class="btn btn-sm btn-primary" style="margin-top: -6px;">Back</a>
                        </span>
                    </h4>
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <th scope="row" style="width: 15%">Tanggal Mulai</th>
                                    <td style="width: 5%">:</td>
                                    <td>{{ $data->date_start->format('d/m/Y') }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" style="width: 15%">Tanggal Selesai</th>
                                    <td style="width: 5%">:</td>
                                    <td>{{ $data->date_end->format('d/m/Y') }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Lokasi</th>
                                    <td>:</td>
                                    <td>{{ $data->location }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Partner</th>
                                    <td>:</td>
                                    <td>{{ $data->partner }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Anggaran</th>
                                    <td>:</td>
                                    <td>{{ $data->budget }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Terpakai</th>
                                    <td>:</td>
                                    <td>{{ $data->used }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Sisa</th>
                                    <td>:</td>
                                    <td>{{ $data->balance }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row-->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Data Peserta</h4>
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <th scope="row" style="width: 15%">Jumlah Laki-laki</th>
                                    <td style="width: 5%">:</td>
                                    <td>{{ $data->total_male }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Jumlah Perempuan</th>
                                    <td>:</td>
                                    <td>{{ $data->total_female }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row-->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Peserta Rentang Usia</h4>
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>10-19</th>
                                    <th>20-29</th>
                                    <th>30-39</th>
                                    <th>40-49</th>
                                    <th>50-59</th>
                                    <th>>60</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $data->range_age_1 }}</td>
                                    <td>{{ $data->range_age_2 }}</td>
                                    <td>{{ $data->range_age_3 }}</td>
                                    <td>{{ $data->range_age_4 }}</td>
                                    <td>{{ $data->range_age_5 }}</td>
                                    <td>{{ $data->range_age_6 }}</td>
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
