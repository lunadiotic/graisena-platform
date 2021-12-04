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
                <h4 class="page-title">{{ $data->title }}</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    @php
        $item = $data->subprogram()->get();
    @endphp

    @foreach ($item as $subprogram)
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mt-3">
                                <p><b>{{ $data->title }}</b></p>
                                <p class="text-muted">{{ $data->description }}</p>
                            </div>
                        </div><!-- end col -->
                        <div class="col-md-4 offset-md-2">
                            <div class="mt-3 float-end">
                                <p><strong>Tanggal Mulai : </strong> <span class="float-end"> &nbsp;&nbsp;&nbsp;&nbsp; {{ $subprogram->date_start }} </span></p>
                                <p><strong>Tanggal Selesai : </strong> <span class="float-end">{{ $subprogram->date_end }}</span></p>
                                <p><strong>Lokasi</strong> <span class="float-end">{{ $subprogram->location }} </span></p>
                            </div>
                        </div><!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table mt-4 table-centered">
                                    <thead>
                                    <tr>
                                        <th style="width: 10%">#</th>
                                        <th class="text-center">laki-Laki</th>
                                        <th class="text-center">Perempuan</th>
                                        <th class="text-center">10-19</th>
                                        <th class="text-center">20-29</th>
                                        <th class="text-center">30-39</th>
                                        <th class="text-center">40-49</th>
                                        <th class="text-center">50-59</th>
                                        <th class="text-center">>60</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td class="text-center">{{ $subprogram->total_male }}</td>
                                        <td class="text-center">{{ $subprogram->total_female }}</td>
                                        <td class="text-center">{{ $subprogram->range_age_1 }}</td>
                                        <td class="text-center">{{ $subprogram->range_age_2 }}</td>
                                        <td class="text-center">{{ $subprogram->range_age_3 }}</td>
                                        <td class="text-center">{{ $subprogram->range_age_4 }}</td>
                                        <td class="text-center">{{ $subprogram->range_age_5 }}</td>
                                        <td class="text-center">{{ $subprogram->range_age_6 }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div> <!-- end table-responsive -->
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="float-end">
                                <p><b>Anggaran:</b> <span class="float-end">{{ $subprogram->budget }}</span></p>
                                <p><b>Terpakai:</b> <span class="float-end"> &nbsp;&nbsp;&nbsp; {{ $subprogram->used }}</span></p>
                                <h3>{{ $subprogram->balance }}</h3>
                            </div>
                            <div class="clearfix"></div>
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

    @endforeach

</div> <!-- container -->
@endsection

@push('scripts')
@endpush
