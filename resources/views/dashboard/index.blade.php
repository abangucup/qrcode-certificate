@extends('dashboard.layouts.app')

@section('title', 'Dashboard')

@section('content')

<!-- Page body -->
<div class="page-body">
    <div class="container-xl">
        <div class="row row-deck row-cards">
            <h2>Aplikasi Generate QR Code</h2>
            <span>Generate QR Code untuk memudahkan dalam melakukan pemantauan pada setiap usaha yang telah
                terverifikasi
            </span>
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
                        <div class="h1 mb-3">{{ count($usahas) }} Usaha</div>
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
                            <div class="h1 mb-3 me-2">{{ $countHasil }} Terverifikasi</div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Tersertifikasi</h2>
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
                                        <th>QR Code</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($usahas as $usaha)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $usaha->jenis_usaha ?? 'Kosong' }}</td>
                                        <td>{{ $usaha->nama_usaha ?? 'Kosong' }}</td>
                                        <td>{{ $usaha->pemilik_usaha ?? 'Kosong' }}</td>
                                        <td>{!! QrCode::size(50)->generate(route('usaha.show', $usaha->id)); !!}</td>
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