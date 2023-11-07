<!DOCTYPE html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta17
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Hasil Pemeriksaan</title>
    <!-- CSS files -->
    <link href="{{ asset('assets/css/tabler.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/tabler-flags.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/tabler-payments.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/tabler-vendors.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/demo.min.css') }}" rel="stylesheet" />
    <style>
        @import url("https://rsms.me/inter/inter.css");

        :root {
            --tblr-font-sans-serif: "Inter Var", -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
</head>

<body class="d-flex flex-column">
    <script src="{{ asset('assets/js/demo-theme.min.js') }}"></script>

    <div class="page-body" id="card-container">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-md-6 col-lg-9">
                    <div class="shadow mb-4">
                        <div class="card">
                            <div class="card-header">
                                <h2>BIODATA USAHA</h2>
                            </div>
                            <!-- Photo -->
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Pemilik Usaha</label>
                                    <input type="text" class="form-control" value="{{ $usaha->pemilik_usaha }}"
                                        disabled />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nama Usaha</label>
                                    <input type="text" class="form-control" value="{{ $usaha->nama_usaha }}" disabled />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Jenis Usaha</label>
                                    <input type="text" class="form-control" value="{{ $usaha->jenis_usaha }}"
                                        disabled />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="shadow mb-4">
                        <div class="card">
                            <div class="card-header">
                                <h2>HASIL PEMERIKSAAN</h2>
                            </div>
                            <!-- Photo -->
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">HASIL PEMERIKSAAN LABORATORIUM</label>
                                    <iframe
                                        src="{{ asset('assets/pdf.js/web/viewer.html?file=') }}{{ asset($usaha->hasil->hasil_bakteri) }}"
                                        width="100%" height="400px"></iframe>
                                </div>
                                {{-- <div class="mb-3">
                                    <label class="form-label">Hasil Kimia</label>
                                    <iframe
                                        src="{{ asset('assets/pdf.js/web/viewer.html?file=') }}{{ asset($usaha->hasil->hasil_kimia) }}"
                                        width="100%" height="400px"></iframe>
                                </div> --}}
                                <div class="mb-3">
                                    <label class="form-label">FORM INSPEKSI KESEHATAN LINGKUNGAN</label>
                                    <iframe
                                        src="{{ asset('assets/pdf.js/web/viewer.html?file=') }}{{ asset($usaha->hasil->hasil_fisik) }}"
                                        width="100%" height="400px"></iframe>
                                </div>
                                {{-- <div class="mb-3">
                                    <label class="form-label">Hasil Uji</label>
                                    <iframe
                                        src="{{ asset('assets/pdf.js/web/viewer.html?file=') }}{{ asset($usaha->hasil->hasil_uji) }}"
                                        width="100%" height="400px"></iframe>
                                </div> --}}
                                <div class="mb-3">
                                    <label class="form-label">HASIL VERIFIKASI LAPANGAN</label>
                                    <iframe
                                        src="{{ asset('assets/pdf.js/web/viewer.html?file=') }}{{ asset($usaha->hasil->hasil_pemeriksaan) }}"
                                        width="100%" height="400px"></iframe>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">SERTIFIKAT LAIK HYGIENE SANITASI</label>

                                    <iframe
                                        src="{{ asset('assets/pdf.js/web/viewer.html?file=') }}{{ asset($usaha->hasil->sertifikat_layak_sehat) }}"
                                        width="100%" height="400px"></iframe>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">SERTIFIKAT PELATIHAN KEAMANAN PANGAN SIAP SAJI BAGI
                                        PENJAMAH
                                        PANGAN / SERTIFIKAT HYGIENE SANITASI BAGI OPERATOR DEPOT AIR MINUM</label>
                                    <iframe
                                        src="{{ asset('assets/pdf.js/web/viewer.html?file=') }}{{ asset($usaha->hasil->sertifikat_penjamak_makanan) }}"
                                        width="100%" height="400px"></iframe>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">SERTIFIKAT PELATIHAN KEAMANAN PANGAN SIAP SAJI BAGI
                                        PENAGGUNG
                                        JAWAB / PEMILIK TPP</label>
                                    <iframe
                                        src="{{ asset('assets/pdf.js/web/viewer.html?file=') }}{{ asset($usaha->hasil->sertifikat_penjamak_pj) }}"
                                        width="100%" height="400px"></iframe>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">NOMOR INDUK BERUSAHA (NIB)</label>
                                    <iframe
                                        src="{{ asset('assets/pdf.js/web/viewer.html?file=') }}{{ asset($usaha->hasil->nib) }}"
                                        width="100%" height="400px"></iframe>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">SURAT REKOMENDASI</label>
                                    <iframe
                                        src="{{ asset('assets/pdf.js/web/viewer.html?file=') }}{{ asset($usaha->hasil->izin_usaha) }}"
                                        width="100%" height="400px"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class=" col-md-6 col-lg-3">
                    <div class="shadow">
                        <div class="card">
                            <div class="m-2 d-flex justify-content-center">
                                {!! QrCode::size(300)->generate(route('usaha.show', $usaha->id)); !!}
                            </div>
                            <!-- Photo -->
                            <div class="card-body">
                                <h3 class="card-title">QR CODE</h3>
                                <ul class="list-unstyled space-y-1">
                                    <li>
                                        <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon text-green" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M5 12l5 5l10 -10" />
                                        </svg>
                                        Lulus Uji Layak Sehat
                                    </li>
                                    <li>
                                        <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon text-green" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M5 12l5 5l10 -10" />
                                        </svg>
                                        Lulus Kesehatan Karyawan
                                    </li>
                                    <li>
                                        <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon text-green" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M5 12l5 5l10 -10" />
                                        </svg>
                                        Lulus Masa Berlaku Sertifikat Usaha
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="{{ asset('assets/js/tabler.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/demo.min.js') }}" defer></script>
</body>

</html>