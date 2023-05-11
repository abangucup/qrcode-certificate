@extends('dashboard.layouts.app')

@section('title', 'Hasil')

@section('content')
<!-- Page header -->
<div class="page-header d-print-none">
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">Sertifikasi Keamanan Pangan</h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <button onclick="printCard()" class="btn btn-primary d-none d-sm-inline-block">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                        Print Card
                    </button>
                    <button onclick="printCard()" class="btn btn-primary d-sm-none btn-icon" aria-label="Print Card">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page body -->
<div class="page-body" id="card-container">
    <div class="container-xl">
        <div class="row row-cards">

            @foreach ($usahas as $usaha)
            <div class="col-lg-6 mt-4">
                <div class="card  shadow-sm  print-card-wrapper">
                    <div class="row no-gutters">
                        <div class="col-md-3 d-flex justify-content-center mt-2">
                            {!! QrCode::size(110)->generate(route('usaha.show', $usaha->id)); !!}
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h4 class="card-title">{{ $usaha->pemilik_usaha }}</h4>
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
            @endforeach
        </div>
    </div>
</div>
@endsection

@push('style')
<style>
    @media print {

        /* Set lebar kertas */
        @page {
            size: A4 landscape;
            /* Atur ukuran kertas */
            margin: 0, 10px, 0, 10px;
        }

        /* Set lebar container sesuai kertas */
        .container {
            width: 297mm;
            /* Atur lebar container untuk ukuran A4 landscape */
            padding: 0;
        }

        /* Atur lebar kolom agar bisa memuat 2 card */
        .col-lg-6 {
            width: 50%;
            float: left;
            padding: 5px;
            box-sizing: border-box;
        }

        .print-card-wrapper {
            border: 1px solid #000;
            padding: 5px;
            margin-bottom: 5px;
            /* Tambahkan gaya lain sesuai kebutuhan Anda */
        }
    }

    /* <div class="print-card-wrapper">
                                <div class="visible-print ms-4 mt-3 w-100 h-100 object-cover card-img-start"> */
</style>
@endpush
@push('script')
<script>
    function printCard() {
        var printContent = document.getElementById("card-container");
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContent.innerHTML;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>
@endpush