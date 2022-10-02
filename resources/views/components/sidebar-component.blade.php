<div class="iq-sidebar">
    <div class="iq-sidebar-logo d-flex justify-content-between">
        <a href="{{route('admin')}}">
            <img src="{{asset('assets/images/logo.png')}}" class="img-fluid" alt="">
            <span>E-Desa</span>
        </a>
        <div class="iq-menu-bt align-self-center">
            <div class="wrapper-menu">
                <div class="line-menu half start"></div>
                <div class="line-menu"></div>
                <div class="line-menu half end"></div>
            </div>
        </div>
    </div>
    <div id="sidebar-scrollbar">
        <nav class="iq-sidebar-menu">
            <ul id="iq-sidebar-toggle" class="iq-menu">
                <li class="iq-menu-title"><i class="ri-separator"></i><span>Main</span></li>
                <li>
                    <a href="{{route('admin')}}" class="iq-waves-effect"><i class="ri-home-4-line"></i><span>Dashboard</span></a>
                </li>
                <li>
                    <a href="{{route('desa')}}" class="iq-waves-effect"><i class="ri-community-line"></i><span>Data Desa</span></a>
                </li>
                <li>
                    <a href="{{route('rw')}}" class="iq-waves-effect"><i class="ri-building-2-line"></i><span>RW / Kelurahan</span></a>
                </li>
                <li>
                    <a href="#penduduk" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-shield-user-line"></i><span>Data Penduduk</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                    <ul id="penduduk" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li><a href="{{route('penduduk')}}">List Data</a></li>
                        <li><a href="{{route('penduduk.create')}}">Tambah Data</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div class="p-3"></div>
    </div>
</div>