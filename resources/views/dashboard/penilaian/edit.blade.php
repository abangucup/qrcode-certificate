@extends('dashboard.layouts.app')

@section('title', 'Tambah Penilaian')

@section('content')

<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <ol class="breadcrumb breadcrumb-arrows">
                    <li class="breadcrumb-item"><a href="{{ route('usaha.index') }}">List Data Usaha</a></li>
                    <li class="breadcrumb-item active"><a href="#">Tambah Data</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-12">

                {{-- FORM --}}
                <form class="card" action="{{ route('usaha.update', $usaha->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-header">
                        <h3 class="card-title">Form Edit Data</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label required">Pemilik Usaha</label>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Pemilik Usaha"
                                    value="{{ $usaha->pemilik_usaha }}" name="pemilik_usaha" required />
                                <small class="form-hint">Nama dari pemilik usaha.</small>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Nama Usaha</label>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Nama  Usaha"
                                    value="{{ $usaha->nama_usaha }}" name="nama_usaha" required />
                                <small class="form-hint">Nama usahanya.</small>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Jenis Usaha</label>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Jenis Usaha"
                                    value="{{ $usaha->jenis_usaha }}" name="jenis_usaha" required />
                                <small class="form-hint">Jenis dari usaha tersebut.</small>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Hasil Pemeriksaan Bakteri</label>
                            <div class="col">
                                <input type="file" class="form-control" name="hasil_bakteri" />
                                <small class="form-hint">Upload file hasil pemeriksaan bakteri.</small>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Hasil Pemeriksaan Kimia</label>
                            <div class="col">
                                <input type="file" class="form-control" name="hasil_kimia" />
                                <small class="form-hint">Upload file hasil pemeriksaan kimia.</small>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Hasil Pemeriksaan Fisik</label>
                            <div class="col">
                                <input type="file" class="form-control" name="hasil_fisik" />
                                <small class="form-hint">Upload file hasil pemeriksaan fisik.</small>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Hasil Uji</label>
                            <div class="col">
                                <input type="file" class="form-control" name="hasil_uji" />
                                <small class="form-hint">Upload file hasil uji.</small>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Sertifikat Layak Sehat</label>
                            <div class="col">
                                <input type="file" class="form-control" name="sertifikat_layak_sehat" />
                                <small class="form-hint">Upload file sertifikat layak sehat.</small>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Sertifikat Penjamak Makanan</label>
                            <div class="col">
                                <input type="file" class="form-control" name="sertifikat_penjamak_makanan" />
                                <small class="form-hint">Upload file sertifikat penjamak makanan.</small>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Sertifikat Penjamak Penanggung
                                Jawab</label>
                            <div class="col">
                                <input type="file" class="form-control" name="sertifikat_penjamak_pj" />
                                <small class="form-hint">Upload file sertifikat penjamak penanggung jawab.</small>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Hasil Pemeriksaan</label>
                            <div class="col">
                                <input type="file" class="form-control" name="hasil_pemeriksaan" />
                                <small class="form-hint">Upload file sertifikat hasil pemeriksaan.</small>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">NIB (Nomor Induk Berusaha)</label>
                            <div class="col">
                                <input type="file" class="form-control" name="nib" />
                                <small class="form-hint">Upload file nomor induk berusaha (NIB).</small>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Surat Izin Usaha</label>
                            <div class="col">
                                <input type="file" class="form-control" name="izin_usaha" />
                                <small class="form-hint">Upload file izin usaha.</small>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-warning">Ubah Data</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection