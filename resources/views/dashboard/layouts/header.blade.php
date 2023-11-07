<header class="navbar navbar-expand-md navbar-light d-print-none py-3">
    <div class="container-xl">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu"
            aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <a href=".">
                <img src="{{ asset('assets/static/logo_p2pl.jpg') }}" alt="P2PL" height="50px" width="50px">
            </a>
        </h1>

        {{-- Menu --}}
        <div class="collapse navbar-collapse" id="navbar-menu">
            <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
                <ul class="navbar-nav">
                    <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('home') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Home
                            </span>
                        </a>
                    </li>
                    {{-- Data usaha merupakan inputan data usaha yang dilakukan pemeriksaan --}}
                    <li class="nav-item {{ Request::is('usaha') || Request::is('usaha/create') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('usaha.index') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-certificate"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M15 15m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                                    <path d="M13 17.5v4.5l2 -1.5l2 1.5v-4.5"></path>
                                    <path
                                        d="M10 19h-5a2 2 0 0 1 -2 -2v-10c0 -1.1 .9 -2 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -1 1.73">
                                    </path>
                                    <path d="M6 9l12 0"></path>
                                    <path d="M6 12l3 0"></path>
                                    <path d="M6 15l2 0"></path>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Data Usaha
                            </span>
                        </a>
                    </li>
                    <li class="nav-item {{ Request::is('hasil') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('hasil.index') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-report-analytics" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path
                                        d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2">
                                    </path>
                                    <path
                                        d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z">
                                    </path>
                                    <path d="M9 17v-5"></path>
                                    <path d="M12 17v-1"></path>
                                    <path d="M15 17v-3"></path>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Hasil Pemeriksaan
                            </span>
                        </a>
                    </li>
                    {{-- Hasil pemeriksaan menampilkan hasil dan generate QRCODE --}}
                </ul>
            </div>
        </div>
        {{-- End Menu --}}
    </div>
</header>