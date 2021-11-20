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
                <h4 class="page-title">Data Relawan: {{ $volunteer->name }}</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title d-flex justify-content-between">
                        <span>Relawan</span>
                        <span>
                            <a href="{{ url()->previous() }}" class="btn btn-sm btn-primary" style="margin-top: -6px;">Back</a>
                        </span>
                    </h4>
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <th scope="row">Nama</th>
                                    <td>:</td>
                                    <td>{{ $volunteer->name }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Tanggal Lahir</th>
                                    <td>:</td>
                                    <td>{{ $volunteer->date_of_birth->format('d-m-Y') }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Jenis Kelamin</th>
                                    <td>:</td>
                                    <td>{{ $volunteer->getGender() }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Provinsi</th>
                                    <td>:</td>
                                    <td>{{ $volunteer->province->name }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Kota/Kab</th>
                                    <td>:</td>
                                    <td>{{ $volunteer->regency->name }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Alamat</th>
                                    <td>:</td>
                                    <td>{{ $volunteer->address }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Status Perkawinan</th>
                                    <td>:</td>
                                    <td>{{ $volunteer->getMarital() }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Status Pekerjaan</th>
                                    <td>:</td>
                                    <td>{{ $volunteer->getJob() }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Telepon</th>
                                    <td>:</td>
                                    <td>{{ $volunteer->phone }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Email</th>
                                    <td>:</td>
                                    <td>{{ $volunteer->email }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Media Sosial</th>
                                    <td>:</td>
                                    <td>{{ $volunteer->media_social }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Afiliasi</th>
                                    <td>:</td>
                                    <td>{{ $volunteer->affiliate }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Status Keaktifan</th>
                                    <td>:</td>
                                    <td>{{ $volunteer->getStatus() }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Keahlian</th>
                                    <td>:</td>
                                    <td>
                                        <ul>
                                            @foreach (explode(',', $volunteer->skill) as $skill)
                                                <li>{{ $skill }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
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
