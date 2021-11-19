@extends('layouts.app')

@push('styles')
@endpush

@section('content')
<!-- Start Content-->
<div class="container-fluid">
    <form action="{{ route('volunteer.update', $data->id) }}" method="POST">
        @csrf @method('put')
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Data Relawan</h4>
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
                                        name="name" id="name" value="{{ old('name', $data->name) }}" required
                                        autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="text-danger" role="alert">
                                        <small><strong>{{ $message }}</strong></small>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="gender" class="form-label">Jenis Kelamin</label>
                                    <select name="gender" id="gender"
                                        class="form-control  @error('gender') is-invalid @enderror">
                                        <option value="m" {{ old('gender', $data->gender)=='m' ? 'selected' : ''
                                            }}>Laki-laki</option>
                                        <option value="f" {{ old('gender', $data->gender)=='f' ? 'selected' : ''
                                            }}>Perempuan</option>
                                    </select>
                                    @error('gender')
                                    <span class="text-danger" role="alert">
                                        <small><strong>{{ $message }}</strong></small>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="date_of_birth" class="form-label">Tanggal Lahir</label>
                                    <input class="form-control @error('date_of_birth') is-invalid @enderror" type="date"
                                        name="date_of_birth" id="date_of_birth"
                                        value="{{ old('date_of_birth', $data->date_of_birth) }}" required
                                        autocomplete="date_of_birth">
                                    @error('date_of_birth')
                                    <span class="text-danger" role="alert">
                                        <small><strong>{{ $message }}</strong></small>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="status_of_marital" class="form-label">Status Perkawinan</label>
                                    <select name="status_of_marital" id="status_of_marital"
                                        class="form-control  @error('status_of_marital') is-invalid @enderror">
                                        <option value="s" {{ old('status_of_marital', $data->status_of_marital)=='s' ?
                                            'selected' : '' }}>Lajang
                                        </option>
                                        <option value="m" {{ old('status_of_marital', $data->status_of_marital)=='m' ?
                                            'selected' : '' }}>Menikah
                                        </option>
                                        <option value="d" {{ old('status_of_marital', $data->status_of_marital)=='d' ?
                                            'selected' : '' }}>Cerai
                                        </option>
                                        <option value="w" {{ old('status_of_marital', $data->status_of_marital)=='w' ?
                                            'selected' : '' }}>Cerai
                                            Mati
                                        </option>
                                    </select>
                                    @error('status_of_marital')
                                    <span class="text-danger" role="alert">
                                        <small><strong>{{ $message }}</strong></small>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="status_of_job" class="form-label">Status Perkawinan</label>
                                    <select name="status_of_job" id="status_of_job"
                                        class="form-control  @error('status_of_job') is-invalid @enderror">
                                        <option value="s" {{ old('status_of_job', $data->status_of_job)=='s' ?
                                            'selected' : '' }}>Pelajar
                                        </option>
                                        <option value="w" {{ old('status_of_job', $data->status_of_job)=='w' ?
                                            'selected' : '' }}>Bekerja
                                        </option>
                                        <option value="n" {{ old('status_of_job', $data->status_of_job)=='n' ?
                                            'selected' : '' }}>Tidak
                                            Bekerja
                                        </option>
                                    </select>
                                    @error('status_of_job')
                                    <span class="text-danger" role="alert">
                                        <small><strong>{{ $message }}</strong></small>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="province_id" class="form-label">Provinsi</label>
                                    <select name="province_id" id="province_id"
                                        class="form-control  @error('province_id') is-invalid @enderror">
                                        <option value="">-</option>
                                        @foreach ($provinces as $id => $name)
                                        <option value="{{ $id }}" {{ $data->province_id == $id ? 'selected' : ''}}>
                                            {{ $name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('province_id')
                                    <span class="text-danger" role="alert">
                                        <small><strong>{{ $message }}</strong></small>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="regency_id" class="form-label">Kota</label>
                                    <select name="regency_id" id="regency_id"
                                        class="form-control  @error('regency_id') is-invalid @enderror">
                                        @if ($data->regency_id)
                                        <option value="{{ $data->regency_id }}">{{ $data->regency->name }}</option>
                                        @endif
                                    </select>
                                    @error('regency_id')
                                    <span class="text-danger" role="alert">
                                        <small><strong>{{ $message }}</strong></small>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="address" class="form-label">Alamat Lengkap</label>
                                    <textarea name="address" id="address" cols="30" rows="10"
                                        class="form-control @error('address') is-invalid @enderror"
                                        required>{{ old('address', $data->address) }}</textarea>
                                    @error('address')
                                    <span class="text-danger" role="alert">
                                        <small><strong>{{ $message }}</strong></small>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="phone" class="form-label">No. WhatsApp/HP</label>
                                    <input type="text" name="phone" id="phone"
                                        class="form-control @error('phone') is-invalid @enderror"
                                        value="{{ old('phone', $data->phone) }}">
                                    @error('phone')
                                    <span class="text-danger" role="alert">
                                        <small><strong>{{ $message }}</strong></small>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="emailaddress" class="form-label">Email address</label>
                                    <input class="form-control @error('email') is-invalid @enderror" type="email"
                                        name="email" id="email" value="{{ old('email', $data->email) }}"
                                        autocomplete="email">
                                    @error('email')
                                    <span class="text-danger" role="alert">
                                        <small><strong>{{ $message }}</strong></small>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="media_social" class="form-label">Nama Pengguna Media Sosial
                                        (Facebook/Instagram/TikTok)</label>
                                    <input type="text" name="media_social" id="media_social"
                                        class="form-control @error('media_social') is-invalid @enderror"
                                        value="{{ old('media_social', $data->media_social) }}">
                                    @error('media_social')
                                    <span class="text-danger" role="alert">
                                        <small><strong>{{ $message }}</strong></small>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="affiliate" class="form-label">Afiliasi</label>
                                    <input type="text" name="affiliate" id="affiliate"
                                        class="form-control @error('affiliate') is-invalid @enderror"
                                        value="{{ old('affiliate', $data->affiliate) }}">
                                    @error('affiliate')
                                    <span class="text-danger" role="alert">
                                        <small><strong>{{ $message }}</strong></small>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="skill" class="form-label">Bidang Kemampuan (Pisahkan Dengan Tanda [,]
                                        Koma
                                        Jika Lebih Dari Satu)</label>
                                    <input type="text" name="skill" id="skill"
                                        class="form-control @error('skill') is-invalid @enderror"
                                        value="{{ old('skill', $data->affiliate) }}">
                                    @error('skill')
                                    <span class="text-danger" role="alert">
                                        <small><strong>{{ $message }}</strong></small>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="active" class="form-label">Status</label>
                                    <select name="active" id="active"
                                        class="form-control  @error('active') is-invalid @enderror">
                                        <option value="1" {{ old('active')=='1' ? 'selected' : '' }}>Aktif</option>
                                        <option value="0" {{ old('active')=='0' ? 'selected' : '' }}>Non-Aktif</option>
                                    </select>
                                    @error('active')
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
            $.post("/api/location/regencies",
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
