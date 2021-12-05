@extends('layouts.app')

@push('styles')
<link href="{{ asset('assets/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/selectize/css/selectize.bootstrap3.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <form class="d-flex align-items-center mb-3">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control border" id="dash-daterange">
                            <span class="input-group-text bg-blue border-blue text-white">
                                <i class="mdi mdi-calendar-range"></i>
                            </span>
                        </div>
                    </form>
                </div>
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                <i class="fe-file-text font-22 avatar-title text-primary"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <h3 class="text-dark mt-1">
                                    <span data-plugin="counterup">{{ number_format($subprogram)}}</span>
                                </h3>
                                <p class="text-muted mb-1 text-truncate">Total Subprogram</p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                                <i class="fe-users font-22 avatar-title text-success"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <h3 class="text-dark mt-1">
                                    <span data-plugin="counterup">{{ number_format($volunteer) }}</span>
                                </h3>
                                <p class="text-muted mb-1 text-truncate">Volunteer</p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                                <i class="fe-truck font-22 avatar-title text-info"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <h3 class="text-dark mt-1">
                                    <span data-plugin="counterup">{{ number_format($distribution) }}</span>
                                </h3>
                                <p class="text-muted mb-1 text-truncate">Distribution</p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-soft-warning border-warning border">
                                <i class="fe-shield font-22 avatar-title text-warning"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <h3 class="text-dark mt-1">
                                    <span data-plugin="counterup">{{ number_format($nursery) }}</span>
                                </h3>
                                <p class="text-muted mb-1 text-truncate">Nursery</p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->
    </div>
    <!-- end row-->

    <div class="row">
        <div class="col-md-6 col-xl-4">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <h4>Selesai</h4>
                    <div class="table-responsive">
                        <table class="table mt-4 table-centered">
                            <thead>
                            <tr>
                                <th style="width: 10%">#</th>
                                <th class="text-center">Tanggal</th>
                                <th class="text-center">Program</th>
                                <th class="text-center">Hari</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($done as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $item->date_start->toDateString() }}</td>
                                <td class="text-center">{{ $item->program->title }}</td>
                                <td class="text-center">{{ $item->date_start->diffInDays($item->date_end) }}</td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> <!-- end table-responsive -->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-4">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <h4>Sedang Berlangsung</h4>
                    <div class="table-responsive">
                        <table class="table mt-4 table-centered">
                            <thead>
                            <tr>
                                <th style="width: 10%">#</th>
                                <th class="text-center">Tanggal</th>
                                <th class="text-center">Program</th>
                                <th class="text-center">Hari</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($ongoing as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $item->date_start->toDateString() }}</td>
                                <td class="text-center">{{ $item->program->title }}</td>
                                <td class="text-center">{{ $item->date_start->diffInDays($item->date_end) }}</td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> <!-- end table-responsive -->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-4">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <h4>Akan Datang</h4>
                    <div class="table-responsive">
                        <table class="table mt-4 table-centered">
                            <thead>
                            <tr>
                                <th style="width: 10%">#</th>
                                <th class="text-center">Tanggal</th>
                                <th class="text-center">Program</th>
                                <th class="text-center">Hari</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($soon as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $item->date_start->toDateString() }}</td>
                                <td class="text-center">{{ $item->program->title }}</td>
                                <td class="text-center">{{ $item->date_start->diffInDays($item->date_end) }}</td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> <!-- end table-responsive -->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->
    </div>
    <!-- end row-->

</div>
@endsection

@push('scripts')
<!-- third party js -->
<script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/libs/selectize/js/standalone/selectize.min.js') }}"></script>
<!-- third party js ends -->

<script>
    $("#dash-daterange").flatpickr(
        {
            altInput: !0,
            mode: "range",
            altFormat: "j F Y",
            defaultDate: "today"
        }
    )
</script>
@endpush
