@extends('dashboard.layouts.app')

@section('title', 'Dashboard')

@section('content')

<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <div class="row row-deck row-cards">
            <div class="col-sm-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="subheader">Usaha</div>
                            <div class="ms-auto lh-1">
                                <div class="dropdown">
                                    <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">7 Hari Terakhir</a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item active" href="#">7 Hari Terakhir</a>
                                        <a class="dropdown-item" href="#">30 Hari Terakhir</a>
                                        <a class="dropdown-item" href="#">3 Bulan Tarkhir</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="h1 mb-3">50 Usaha</div>
                        <div class="d-flex mb-2">
                            <div>Conversion rate</div>
                            <div class="ms-auto">
                                <span class="text-green d-inline-flex align-items-center lh-1">
                                    7%
                                    <!-- Download SVG icon from http://tabler-icons.io/i/trending-up -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M3 17l6 -6l4 4l8 -8" />
                                        <path d="M14 7l7 0l0 7" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-primary" style="width: 75%" role="progressbar"
                                aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" aria-label="75% Complete">
                                <span class="visually-hidden">75% Complete</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="subheader">Usaha Tersertifikasi</div>
                            <div class="ms-auto lh-1">
                                <div class="dropdown">
                                    <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">7 Hari Terakhir</a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item active" href="#">7 Hari Terakhir</a>
                                        <a class="dropdown-item" href="#">30 Hari Terakhir</a>
                                        <a class="dropdown-item" href="#">3 Bulan Terakhir</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-baseline">
                            <div class="h1 mb-0 me-2">10 Usaha</div>
                            <div class="me-auto">
                                <span class="text-green d-inline-flex align-items-center lh-1">
                                    8%
                                    <!-- Download SVG icon from http://tabler-icons.io/i/trending-up -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M3 17l6 -6l4 4l8 -8" />
                                        <path d="M14 7l7 0l0 7" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div id="chart-revenue-bg" class="chart-sm"></div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tersertifikasi</h3>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-outline-success my-2">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-file-spreadsheet" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z">
                                </path>
                                <path d="M8 11h8v7h-8z"></path>
                                <path d="M8 15h8"></path>
                                <path d="M11 11v7"></path>
                            </svg>Export Excel</button>
                        <button class="btn btn-outline-danger my-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-lambda"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z">
                                </path>
                                <path d="M10 17l2 -3"></path>
                                <path d="M15 17c-2.5 0 -2.5 -6 -5 -6"></path>
                            </svg>Export PDF</button>
                        <button class="btn btn-outline-info my-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-printer"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path
                                    d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2">
                                </path>
                                <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4"></path>
                                <path d="M7 13m0 2a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2z">
                                </path>
                            </svg>Print</button>
                        <div class="table-responsive">
                            <table id="myTable" class="table table-vcenter card-table my-4">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis</th>
                                        <th>Usaha</th>
                                        <th>Pemilik</th>
                                        <th>Hasil Bakteri</th>
                                        <th>Hasil Kimia</th>
                                        <th>Hasil Uji</th>
                                        <th>Sertifikat Kesehatan</th>
                                        <th>Sertifikat Makanan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($usahas as $usaha)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $usaha->jenis_usaha ?? 'Kosong' }}</td>
                                        <td>{{ $usaha->nama_usaha ?? 'Kosong' }}</td>
                                        <td>{{ $usaha->pemilik_usaha ?? 'Kosong' }}</td>
                                        <td>{{ $usaha->hasil->hasil_bakteri ?? 'Kosong' }}</td>
                                        <td>{{ $usaha->hasil->hasil_kimia ?? 'Kosong' }}</td>
                                        <td>{{ $usaha->hasil->hasil_uji ?? 'Kosong' }}</td>
                                        <td>{{ $usaha->hasil->sertifikat_kesehatan ?? 'Kosong' }}</td>
                                        <td>{{ $usaha->hasil->sertifikat_makanan ?? 'Kosong' }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="9" class="text-center">Belum ada data</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection