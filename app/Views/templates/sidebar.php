<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon">
            <i class="fas fa-bullhorn"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Pelayanan Desa</div>
    </a>

    <?php if (session()->get('user_level') == 1) : ?>
        <hr class="sidebar-divider">

        <div class="sidebar-heading">
            Management Data
        </div>

        <li class="nav-item <?= url_is('/admin/manage-user') || url_is('/admin/manage-user/un-verified') ? 'active' : '' ?>">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#users" aria-expanded="true" aria-controls="users">
                <?php if (url_is('/admin/manage-user/un-verified')) : ?>
                    <i class="fas fa-user-times"></i>
                <?php else : ?>
                    <i class="fas fa-users"></i>
                <?php endif; ?>
                <span>Daftar Anggota</span>
            </a>
            <div id="users" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Anggota</h6>
                    <a class="collapse-item" href="/admin/manage-user">Semua Anggota</a>
                    <a class="collapse-item" href="/admin/manage-user/un-verified">Belum Terverifikasi</a>
                </div>
        </li>

        <!-- <li class="nav-item <?= url_is('/recycle-bin') ? 'active' : '' ?>">
            <a class="nav-link" href="/admin">
                <i class="fas fa-fw fa-recycle"></i>
                <span>Recycle Bin</span></a>
        </li> -->
    <?php endif; ?>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Main Menu
    </div>

    <?php if (session()->get('user_level') == 1 or (session()->get('user_level') == 2)) : ?>

        <li class="nav-item <?= url_is('/WargaController/index') || url_is('/WargaController/create') ? 'active' : '' ?>">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#dtwarga" aria-expanded="true" aria-controls="dtwarga">
                <?php if (url_is('/warga/create')) : ?>
                    <i class="fas fa-envelope-open"></i>
                <?php else : ?>
                    <i class="fas fa-list"></i>
                <?php endif; ?>
                <span>Data Warga</span>
            </a>
            <div id="dtwarga" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="/WargaController/index">Semua Warga</a>
                    <a class="collapse-item" href="/WargaController/create">Tambah Data Warga</a>
                </div>
            </div>
        </li>
                <!-- Pengaduan -->

        <li class="nav-item <?= url_is('/admin/pengaduan') || url_is('/admin/pengaduan/masuk') || url_is('/admin/pengaduan/di-proses') || url_is('/admin/pengaduan/selesai') ? 'active' : '' ?>">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pengaduan" aria-expanded="true" aria-controls="pengaduan">
                <?php if (url_is('/admin/pengaduan/masuk')) : ?>
                    <i class="fas fa-envelope-open"></i>
                <?php elseif (url_is('/admin/pengaduan/di-proses')) : ?>
                    <i class="fas fa-spinner"></i>
                <?php elseif (url_is('/admin/pengaduan/selesai')) : ?>
                    <i class="fas fa-check-square"></i>
                <?php else : ?>
                    <i class="fas fa-list"></i>
                <?php endif; ?>
                <span>Daftar Pengaduan</span>
            </a>
            <div id="pengaduan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="/admin/pengaduan">Semua Pengaduan</a>
                    <a class="collapse-item" href="/admin/pengaduan/masuk">Masuk</a>
                    <a class="collapse-item" href="/admin/pengaduan/di-proses">Diproses</a>
                    <a class="collapse-item" href="/admin/pengaduan/selesai">Selesai</a>
                </div>
            </div>
        </li>

                <!-- Artikel atau Berita -->

        <li class="nav-item <?= url_is('/admin/ArticleController') || url_is('/admin/ArticleController/create') || url_is('/admin/ArticleController/edit') ? 'active' : '' ?>">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#articles" aria-expanded="true" aria-controls="articles">
                <?php if (url_is('/admin/ArticleController/create')) : ?>
                    <i class="fas fa-envelope-open"></i>
                <?php elseif (url_is('/admin/ArticleController/edit')) : ?>
                    <i class="fas fa-spinner"></i>
                <?php elseif (url_is('/admin/ArticleController/create')) : ?>
                    <i class="fas fa-check-square"></i>
                <?php else : ?>
                    <i class="fas fa-list"></i>
                <?php endif; ?>
        <span>Daftar Postingan</span>
            </a>
            <div id="articles" class="collapse" aria-labelledby="headingThre" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="/admin/articles">Semua Berita</a>
                    <a class="collapse-item" href="/admin/articles/create">Buat Berita</a>
                </div>
            </div>
        </li>

        <!-- Struktur Organisasi -->

        <li class="nav-item <?= url_is('/admin/OrganizationController') || url_is('/admin/OrganizationController/create') || url_is('/admin/OrganizationController/edit') ? 'active' : '' ?>">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#organization" aria-expanded="true" aria-controls="articles">
                <?php if (url_is('/admin/OrganizationController/create')) : ?>
                    <i class="fas fa-envelope-open"></i>
                <?php elseif (url_is('/admin/OrganizationController/edit')) : ?>
                    <i class="fas fa-spinner"></i>
                <?php elseif (url_is('/admin/OrganizationController/create')) : ?>
                    <i class="fas fa-check-square"></i>
                <?php else : ?>
                    <i class="fas fa-list"></i>
                <?php endif; ?>
        <span>Struktur Organisasi</span>
            </a>
            <div id="organization" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="/admin/organization">Semua Struktur Organisasi</a>
                    <a class="collapse-item" href="/admin/organization/create">Buat Struktur Organisasi</a>
                </div>
            </div>
        </li>

            <!-- Post Kas RW -->

            <li class="nav-item <?= url_is('/KeuanganRWController') || url_is('/KeuanganRWController/create') || url_is('/KeuanganRWController/edit') ? 'active' : '' ?>">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#keuangan" aria-expanded="true" aria-controls="articles">
                <?php if (url_is('/KeuanganRWController/create')) : ?>
                    <i class="fas fa-envelope-open"></i>
                <?php elseif (url_is('/KeuanganRWController/edit')) : ?>
                    <i class="fas fa-spinner"></i>
                <?php elseif (url_is('/KeuanganRWController/create')) : ?>
                    <i class="fas fa-check-square"></i>
                <?php else : ?>
                    <i class="fas fa-list"></i>
                <?php endif; ?>
        <span>Kas RW</span>
            </a>
            <div id="keuangan" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="/KeuanganRWController">Rekapitulasi Kas RW</a>
                    <a class="collapse-item" href="/KeuanganRWController/create">Input Kas RW</a>
                </div>
            </div>
        </li>



                    <!-- Post Agenda RW -->

                    <li class="nav-item <?= url_is('/TodoController') || url_is('/TodoController/create') || url_is('/TodoController/edit') ? 'active' : '' ?>">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#todo" aria-expanded="true" aria-controls="articles">
                <?php if (url_is('/TodoController/create')) : ?>
                    <i class="fas fa-envelope-open"></i>
                <?php elseif (url_is('/TodoController/edit')) : ?>
                    <i class="fas fa-spinner"></i>
                <?php elseif (url_is('/TodoController/create')) : ?>
                    <i class="fas fa-check-square"></i>
                <?php else : ?>
                    <i class="fas fa-list"></i>
                <?php endif; ?>
        <span>Agenda RW</span>
            </a>
            <div id="todo" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="/TodoController">Agenda  RW</a>
                    <a class="collapse-item" href="/TodoController/create">Input Agenda</a>
                </div>
            </div>
        </li>
    <?php endif; ?>
    
        <!-- Pengajuan Surat -->

    
  <!--   <?php if (session()->get('user_level') == 3) : ?>
        <li class="nav-item <?= url_is('/pengajuan') || url_is('/pengajuan/tambah') ? 'active' : '' ?>">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapsTwo">
                <?php if (url_is('/pengajuan/tambah')) : ?>
                    <i class="fas fa-plus"></i>
                <?php else : ?>
                    <i class="fas fa-list"></i>
                <?php endif; ?>
                <span>Pengajuan Surat</span>
            </a>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="/pengajuan">Daftar Pengajuan Surat</a>
                    <a class="collapse-item" href="/pengajuan/tambah">Surat Keterangan Usaha</a>
                </div>
            </div>
        </li>
    <?php endif; ?> -->
    
        <!-- Pengaduan -->

    <?php if (session()->get('user_level') == 3) : ?>
        <li class="nav-item <?= url_is('/pengaduan') || url_is('/pengaduan/tambah') ? 'active' : '' ?>">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsTwo" aria-expanded="true" aria-controls="collapsTwo">
                <?php if (url_is('/pengaduan/tambah')) : ?>
                    <i class="fas fa-plus"></i>
                <?php else : ?>
                    <i class="fas fa-list"></i>
                <?php endif; ?>
                <span>Pengaduan Saya</span>
            </a>
            <div id="collapsTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="/pengaduan">Daftar Pengaduan</a>
                    <a class="collapse-item" href="/pengaduan/tambah">Tambah Baru</a>
                </div>
            </div>
        </li>
    <?php endif; ?>


    <hr class="sidebar-divider">

    <!-- Heading -->

    <div class="sidebar-heading">
        Profile
    </div>

    <li class="nav-item <?= url_is('/user') ? 'active' : '' ?>">
        <a class="nav-link" href="/user">
            <i class="fas fa-fw fa-user"></i>
            <span>Akun Saya</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <li class="nav-item">
        <a class="nav-link pt-0" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Keluar</span></a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>