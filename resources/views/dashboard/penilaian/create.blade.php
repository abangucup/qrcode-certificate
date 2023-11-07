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
                <form class="card" action="{{ route('usaha.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <h3 class="card-title">Form Tambah Data</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label required">Pemilik Usaha</label>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Pemilik Usaha" name="pemilik_usaha"
                                    required />
                                <small class="form-hint">Nama dari pemilik usaha.</small>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Nama Usaha</label>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Nama  Usaha" name="nama_usaha"
                                    required />
                                <small class="form-hint">Nama usahanya.</small>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Jenis Usaha</label>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Jenis Usaha" name="jenis_usaha"
                                    required />
                                <small class="form-hint">Jenis dari usaha tersebut.</small>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">HASIL PEMERIKSAAN LABORATORIUM</label>
                            <div class="col">
                                <input type="file" class="form-control" name="hasil_bakteri" />
                                <small class="form-hint">Upload file</small>
                            </div>
                        </div>
                        {{-- <div class="mb-3">
                            <label class="form-label">Hasil Pemeriksaan Kimia</label>
                            <div class="col">
                                <input type="file" class="form-control" name="hasil_kimia" />
                                <small class="form-hint">Upload file hasil pemeriksaan kimia.</small>
                            </div>
                        </div> --}}
                        <div class="mb-3">
                            <label class="form-label">FORM INSPEKSI KESEHATAN LINGKUNGAN</label>
                            <div class="col">
                                <input type="file" class="form-control" name="hasil_fisik" />
                                <small class="form-hint">Upload file</small>
                            </div>
                        </div>
                        {{-- <div class="mb-3">
                            <label class="form-label">Hasil Uji</label>
                            <div class="col">
                                <input type="file" class="form-control" name="hasil_uji" />
                                <small class="form-hint">Upload file hasil uji.</small>
                            </div>
                        </div> --}}
                        <div class="mb-3">
                            <label class="form-label">SERTIFIKAT LAIK HYGIENE SANITASI</label>
                            <div class="col">
                                <input type="file" class="form-control" name="sertifikat_layak_sehat" />
                                <small class="form-hint">Upload file</small>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">SERTIFIKAT PELATIHAN KEAMANAN PANGAN SIAP SAJI BAGI PENJAMAH
                                PANGAN / SERTIFIKAT HYGIENE SANITASI BAGI OPERATOR DEPOT AIR MINUM</label>
                            <div class="col">
                                <input type="file" class="form-control" name="sertifikat_penjamak_makanan" />
                                <small class="form-hint">Upload file</small>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">SERTIFIKAT PELATIHAN KEAMANAN PANGAN SIAP SAJI BAGI PENAGGUNG
                                JAWAB / PEMILIK TPP</label>
                            <div class="col">
                                <input type="file" class="form-control" name="sertifikat_penjamak_pj" />
                                <small class="form-hint">Upload file</small>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">HASIL VERIFIKASI LAPANGAN</label>
                            <div class="col">
                                <input type="file" class="form-control" name="hasil_pemeriksaan" />
                                <small class="form-hint">Upload file</small>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">NOMOR INDUK BERUSAHA (NIB)</label>
                            <div class="col">
                                <input type="file" class="form-control" name="nib" />
                                <small class="form-hint">Upload file</small>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">SURAT REKOMENDASI</label>
                            <div class="col">
                                <input type="file" class="form-control" name="izin_usaha" />
                                <small class="form-hint">Upload file</small>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection