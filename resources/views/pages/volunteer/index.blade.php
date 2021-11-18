@extends('auth.app')

@section('content')
<div class="account-pages mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-6">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                <div class="card bg-pattern">

                    <div class="card-body p-4">

                        <div class="text-center w-75 m-auto">
                            <p class="text-muted mb-4 mt-3">Selamat Datang di Pendaftaran Relawan Graisena.</p>
                        </div>

                        <form method="POST" action="{{ route('reg.volunteer') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                                    id="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
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
                                    <option value="m" {{ old('gender')=='m' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="f" {{ old('gender')=='m' ? 'selected' : '' }}>Perempuan</option>
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
                                    name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth') }}" required
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
                                    <option value="s" {{ old('status_of_marital')=='s' ? 'selected' : '' }}>Lajang
                                    </option>
                                    <option value="m" {{ old('status_of_marital')=='m' ? 'selected' : '' }}>Menikah
                                    </option>
                                    <option value="d" {{ old('status_of_marital')=='d' ? 'selected' : '' }}>Cerai
                                    </option>
                                    <option value="w" {{ old('status_of_marital')=='w' ? 'selected' : '' }}>Cerai Mati
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
                                    <option value="s" {{ old('status_of_job')=='s' ? 'selected' : '' }}>Pelajar</option>
                                    <option value="w" {{ old('status_of_job')=='w' ? 'selected' : '' }}>Bekerja</option>
                                    <option value="n" {{ old('status_of_job')=='n' ? 'selected' : '' }}>Tidak Bekerja
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
                                    <option value="{{ $id }}">{{ $name }}</option>
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
                                    <option value="">-</option>
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
                                    required>{{ old('address') }}</textarea>
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
                                    value="{{ old('phone') }}">
                                @error('phone')
                                <span class="text-danger" role="alert">
                                    <small><strong>{{ $message }}</strong></small>
                                </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="emailaddress" class="form-label">Email address</label>
                                <input class="form-control @error('email') is-invalid @enderror" type="email"
                                    name="email" id="email" value="{{ old('email') }}" autocomplete="email">
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
                                    value="{{ old('media_social') }}">
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
                                    value="{{ old('affiliate') }}">
                                @error('affiliate')
                                <span class="text-danger" role="alert">
                                    <small><strong>{{ $message }}</strong></small>
                                </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="skill" class="form-label">Bidang Kemampuan (Pisahkan Dengan Tanda [,] Koma
                                    Jika Lebih Dari Satu)</label>
                                <input type="text" name="skill" id="skill"
                                    class="form-control @error('skill') is-invalid @enderror"
                                    value="{{ old('skill') }}">
                                @error('skill')
                                <span class="text-danger" role="alert">
                                    <small><strong>{{ $message }}</strong></small>
                                </span>
                                @enderror
                            </div>

                            <div class="text-center d-grid">
                                <button class="btn btn-primary" type="submit"> Daftar </button>
                            </div>

                        </form>
                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->

                <div class="row mt-3">
                    <div class="col-12 text-center">
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
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
