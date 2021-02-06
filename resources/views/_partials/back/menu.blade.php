<section class="sidebar">
    <br>
    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
        <li><a href="{{ url('back/') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        @maba
        <li><a href="{{ route('back.maba.show', auth()->user()->uuid) }}"><i
                    class="fa fa-file-word-o"></i><span>Formulir Saya</span></a></li>
        <li><a href="{{ route('back.maba.berkas', auth()->user()->uuid) }}"><i
                    class="fa fa-file-text"></i><span>Berkas Persyaratan</span></a></li>
        @endmaba

        @superadmin
        <li class="treeview">
            <a href="#"><i class="fa fa-database"></i> <span>Master</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ route('back.faculty.index') }}">Fakultas</a></li>
                <li><a href="{{ route('back.study.index') }}">Program Studi</a></li>
                <li><a href="{{ route('back.users.index') }}">Data Pengguna</a></li>
            </ul>
        </li>
        @endsuperadmin

        @admin
        <li class="treeview {{ request()->is('back/token*') ? 'active' : '' }}">
            <a href="#"><i class="fa fa-barcode"></i> <span>Token</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                @php
                    $urltoken = route('back.token.index');
                @endphp
                <li class="{{ request()->is('back/token/create') ? 'active' : '' }}"><a
                        href="{{ route('back.token.create') }}">Buat Token</a></li>
                <li class="{{ request('tipe') === 'all' ? 'active' : '' }}"><a
                        href="{{ url($urltoken . '?tipe=all') }}">Data Token</a></li>
                <li class="{{ request('tipe') === 'used' ? 'active' : '' }}"><a
                        href="{{ url($urltoken . '?tipe=used') }}">Token Terpakai</a></li>
            </ul>
        </li>
        @endadmin

        @panitia
        <li class="treeview {{ request()->is('back/pmb*') ? 'active' : '' }}">
            <a href="#"><i class="fa fa-folder"></i> <span>PMB</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ request()->is('back/maba*') ? 'active' : '' }}"><a
                        href="{{ route('back.maba.index') }}">Data Pendaftar</a></li>
                <li class="{{ request()->is('back/pmb/pengumuman*') ? 'active' : '' }}"><a href="#">Pengumuman</a>
                </li>
                <li class="{{ request()->is('back/pmb/arsip*') ? 'active' : '' }}"><a
                        href="{{ route('back.pmb.arsip') }}">Arsip Data</a>
                </li>
                <li class="{{ request()->is('back/pmb/studi/kouta*') ? 'active' : '' }}"><a
                        href="{{ route('back.pmb.studi.kouta') }}">Kouta</a></li>
                <li class="{{ request()->is('back/pmb/pengaturan*') ? 'active' : '' }}"><a
                        href="{{ route('back.pmb.pengaturan') }}">Pengaturan</a></li>
                <li><a href="javascript:void(0)" data-toggle="modal" data-target="#modal-cetak">Cetak Data </a></li>
            </ul>
        </li>
        @endpanitia
    </ul>

</section>
