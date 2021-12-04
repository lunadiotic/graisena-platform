@extends('layouts.app')

@push('styles')
@endpush

@section('content')
{{-- <!-- Start Content-->
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
                                    <th scope="row">Judul</th>
                                    <td>:</td>
                                    <td>{{ $data->title }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Deskripsi</th>
                                    <td>:</td>
                                    <td>{{ $data->description }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row-->
</div> <!-- container --> --}}

<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                {{-- <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">UBold</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Extras Pages</a></li>
                        <li class="breadcrumb-item active">Invoice</li>
                    </ol>
                </div> --}}
                <h4 class="page-title">Nama Program</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- Logo & title -->
                    {{-- <div class="clearfix">
                        <div class="float-start">
                            <div class="auth-logo">
                                <div class="logo logo-dark">
                                    <span class="logo-lg">
                                        <img src="../assets/images/logo-dark.png" alt="" height="22">
                                    </span>
                                </div>

                                <div class="logo logo-light">
                                    <span class="logo-lg">
                                        <img src="../assets/images/logo-light.png" alt="" height="22">
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="float-end">
                            <h4 class="m-0 d-print-none">Invoice</h4>
                        </div>
                    </div> --}}

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mt-3">
                                <p><b>Nama Program</b></p>
                                <p class="text-muted">description panjang wire:Thanks a lot because you keep purchasing our products. Our company promises to provide high quality products for you as well as outstanding customer service for every transaction. </p>
                            </div>

                        </div><!-- end col -->
                        <div class="col-md-4 offset-md-2">
                            <div class="mt-3 float-end">
                                <p><strong>Tanggal Mulai : </strong> <span class="float-end"> &nbsp;&nbsp;&nbsp;&nbsp; Jan 17, 2016</span></p>
                                <p><strong>Tanggal Selesai : </strong> <span class="float-end"><span class="badge bg-danger">Lokasi</span></span></p>
                                <p><strong>Order No. : </strong> <span class="float-end">000028 </span></p>
                            </div>
                        </div><!-- end col -->
                    </div>
                    <!-- end row -->

                    {{-- <div class="row mt-3">
                        <div class="col-sm-6">
                            <h6>Billing Address</h6>
                            <address>
                                Stanley Jones<br>
                                795 Folsom Ave, Suite 600<br>
                                San Francisco, CA 94107<br>
                                <abbr title="Phone">P:</abbr> (123) 456-7890
                            </address>
                        </div> <!-- end col -->

                        <div class="col-sm-6">
                            <h6>Shipping Address</h6>
                            <address>
                                Stanley Jones<br>
                                795 Folsom Ave, Suite 600<br>
                                San Francisco, CA 94107<br>
                                <abbr title="Phone">P:</abbr> (123) 456-7890
                            </address>
                        </div> <!-- end col -->
                    </div> --}}
                    <!-- end row -->

                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table mt-4 table-centered">
                                    <thead>
                                    <tr>
                                        <th style="width: 10%">#</th>
                                        {{-- <th>Item</th> --}}
                                        <th style="width: 10%">Jumlah laki-Laki</th>
                                        <th style="width: 10%">Jumlah Perempuan</th>
                                        <th style="width: 10%">10-19</th>
                                        <th style="width: 10%">20-29</th>
                                        <th style="width: 10%">30-39</th>
                                        <th style="width: 10%">40-49</th>
                                        <th style="width: 10%">50-59</th>
                                        <th style="width: 10%" class="text-end">>60</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        {{-- <td>
                                            <b>Web Design</b> <br/>
                                            2 Pages static website - my website
                                        </td> --}}
                                        <td>22</td>
                                        <td>$30</td>
                                        <td>22</td>
                                        <td>$30</td>
                                        <td>22</td>
                                        <td>$30</td>
                                        <td>22</td>
                                        <td class="text-end">$660.00</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        {{-- <td>
                                            <b>Software Development</b> <br/>
                                            Invoice editor software - AB'c Software
                                        </td> --}}
                                        <td>22</td>
                                        <td>$30</td>
                                        <td>22</td>
                                        <td>$30</td>
                                        <td>22</td>
                                        <td>$30</td>
                                        <td>22</td>
                                        <td class="text-end">$660.00</td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div> <!-- end table-responsive -->
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row">
                        {{-- <div class="col-sm-6">
                            <div class="clearfix pt-5">
                                <h6 class="text-muted">Notes:</h6>

                                <small class="text-muted">
                                    All accounts are to be paid within 7 days from receipt of
                                    invoice. To be paid by cheque or credit card or direct payment
                                    online. If account is not paid within 7 days the credits details
                                    supplied as confirmation of work undertaken will be charged the
                                    agreed quoted fee noted above.
                                </small>
                            </div>
                        </div> <!-- end col --> --}}
                        <div class="col-sm-12">
                            <div class="float-end">
                                <p><b>Anggaran:</b> <span class="float-end">$4597.50</span></p>
                                <p><b>Terpakai:</b> <span class="float-end"> &nbsp;&nbsp;&nbsp; $459.75</span></p>
                                <h3>$4137.75 USD</h3>
                            </div>
                            <div class="clearfix"></div>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="mt-4 mb-1">
                        <div class="text-end d-print-none">
                            <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-printer me-1"></i> Print</a>
                            {{-- <a href="#" class="btn btn-info waves-effect waves-light">Submit</a> --}}
                        </div>
                    </div>
                </div>
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

</div> <!-- container -->
@endsection

@push('scripts')
@endpush
