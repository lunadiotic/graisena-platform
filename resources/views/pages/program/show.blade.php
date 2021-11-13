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
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Program</h4>
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <th scope="row" style="width: 15%">Tanggal</th>
                                    <td style="width: 5%">:</td>
                                    <td>{{ $data->date->format('d/m/Y') }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Judul</th>
                                    <td>:</td>
                                    <td>{{ $data->title }}</td>
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

        @if ($data->attachment)
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Attachment</h4>
                    <a href="{{ route('download.program', ['file'=>$data->attachment]) }}" class="btn btn-primary">Download</a>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
        @endif
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
                                    <th>10-15</th>
                                    <th>16-20</th>
                                    <th>21-30</th>
                                    <th>31-50</th>
                                    <th>51-70</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $data->range_age_1 }}</td>
                                    <td>{{ $data->range_age_2 }}</td>
                                    <td>{{ $data->range_age_3 }}</td>
                                    <td>{{ $data->range_age_4 }}</td>
                                    <td>{{ $data->range_age_5 }}</td>
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
