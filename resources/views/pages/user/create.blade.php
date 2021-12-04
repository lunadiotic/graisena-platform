@extends('layouts.app')

@push('styles')
@endpush

@section('content')
<!-- Start Content-->
<div class="container-fluid">
    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Data Pengguna</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title d-flex justify-content-between">
                            <span>Form</span>
                            <span>
                                <a href="{{ url()->previous() }}" class="btn btn-sm btn-primary"
                                    style="margin-top: -6px;">Back</a>
                            </span>
                        </h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama</label>
                                    <input class="form-control @error('name') is-invalid @enderror" type="text"
                                        name="name" id="name" value="{{ old('name') }}" required
                                        autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="text-danger" role="alert">
                                        <small><strong>{{ $message }}</strong></small>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="emailaddress" class="form-label">Email address</label>
                                    <input class="form-control @error('email') is-invalid @enderror" type="email"
                                        name="email" id="email" value="{{ old('email') }}" required
                                        autocomplete="email">
                                    @error('email')
                                    <span class="text-danger" role="alert">
                                        <small><strong>{{ $message }}</strong></small>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="role_id" class="form-label">Role</label>
                                    <select name="role_id" id="role_id" class="form-control @error('role_id') is-invalid @enderror" required>
                                        @foreach ($roles as $id => $name)
                                        <option value="{{ $id }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                    @error('role_id')
                                    <span class="text-danger" role="alert">
                                        <small><strong>{{ $message }}</strong></small>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            autocomplete="current-password">
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                    @error('password')
                                    <span class="text-danger" role="alert">
                                        <small><strong>{{ $message }}</strong></small>
                                    </span>
                                    @enderror
                                </div>
                            </div> <!-- end col -->
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
                        <div class="d-flex justify-content-end btn-group" role="group">
                            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">
                                Reset
                            </a>
                            <button type="submit" class="btn btn-outline-primary">
                                Save
                            </button>
                        </div>
                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->
    </form>
</div> <!-- container -->
@endsection

@push('scripts')
<script>
    $(function () {
        $('#province_id').on('change', function () {
            $.post("{{ route('api.location.regencies') }}",
                {
                    id: $(this).val()
                },
                function(data, status){
                    $('#regency_id').empty();
                    $.each(data, function (id, name) {
                        $('#regency_id').append(new Option(name, id))
                    })
                }
            );
        });
    });
</script>
@endpush
