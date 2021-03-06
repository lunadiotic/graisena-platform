@extends('layouts.app')

@push('styles')
<link href="{{ asset('assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css') }}" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('assets/libs/datatables.net-select-bs5/css//select.bootstrap5.min.css') }}" rel="stylesheet"
    type="text/css" />
@endpush

@section('content')
<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Volunteer</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title d-flex justify-content-between">
                        <span>Basic Data Table</span>
                        <span>
                            <form action="{{ route('report.sheet.volunteer') }}">
                                <div class="input-group" style="margin-top: -6px;">
                                    <select name="regency_id" id="regency_id" class="form-control input-sm">
                                        <option value="0">All</option>
                                        @foreach ($volunteerRegency as $item)
                                            <option value="{{ $item->regency->id }}">{{ $item->regency->name }}</option>
                                        @endforeach
                                    </select>
                                    <button class="btn input-group-text btn-sm btn-dark waves-effect waves-light" type="submit">Export</button>
                                    <a href="{{ route('volunteer.create') }}" class="btn btn-primary">Create</a>
                                    </div>
                            </form>
                        </span>
                    </h4>
                    <table id="datatable" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nomor ID</th>
                                <th>Nama</th>
                                <th>Gender</th>
                                <th>Kota</th>
                                <th>Afiliasi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row-->

</div> <!-- container -->
@endsection

@push('scripts')
<!-- third party js -->
<script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>
<!-- third party js ends -->

<!-- Datatables init -->
<script>
    $(document).ready(function() {
        var table = $('#datatable').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: "{{ route('volunteer.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'id'},
                {data: 'identity_number', name: 'identity_number'},
                {data: 'name', name: 'name'},
                {data : function(data) {
                    if (data.gender == 'm') {
                        return 'Laki-laki'
                    } else {
                        return 'Perempuan'
                    }
                }, name: 'gender'},
                {data: 'regency.name', name: 'regency.name'},
                {data: 'affiliate', name: 'affiliate'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>
@endpush
