<nav id="mainnav-container">
    <div id="mainnav">
        <div id="mainnav-menu-wrap">
            <div class="nano">
                <div class="nano-content">
                    <ul id="mainnav-menu" class="list-group">
                        <li>
                            <a href="{{ route('dashboard') }}">
                                <i class="fa fa-home"></i>
                                <span class="menu-title">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-database"></i>
                                <span class="menu-title">Data Master</span>
                                <i class="arrow"></i>
                            </a>
                            <ul class="collapse">
                                <li><a href="{{ route('prodi.index') }}"><i class="fa fa-caret-right"></i> Data
                                        Prodi</a></li>
                                <li><a href="{{ route('mahasiswa.index') }}"><i class="fa fa-caret-right"></i> Data
                                        Mahasiswa</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('pembayaran.index') }}">
                                <i class="fa fa-money"></i>
                                <span class="menu-title">Pembayaran</span>
                            </a>
                        </li>
                        {{-- <li>
                            <a href="{{ route('laporan') }}">
                                <i class="fa fa-file-text-o"></i>
                                <span class="menu-title">Laporan</span>
                            </a>
                        </li> --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
