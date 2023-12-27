  <div class="container-scroller">
      <div class="container-fluid page-body-wrapper">
          <!-- partial:partials/_sidebar.html -->
          <nav class="sidebar sidebar-offcanvas" id="sidebar">
              <ul class="nav">
                  <li class="nav-item">
                      <a class="nav-link" href="<?php echo base_url('/Peminjam'); ?>">
                          <i class="mdi mdi-grid-large menu-icon"></i>
                          <span class="menu-title">Dashboard</span>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="<?php echo base_url('/jadwalpeminjaman'); ?>">
                          <i class="mdi mdi-calendar-clock menu-icon"></i>
                          <span class="menu-title">Jadwal</span>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a class="nav-link" href="<?php echo base_url('/profilpeminjam'); ?>">
                          <i class="mdi mdi-account-circle-outline menu-icon"></i>
                          <span class="menu-title">Profil</span>
                      </a>
                  </li>

                  <li class="nav-item">
                      <a class="nav-link" href="<?= base_url('/keluar') ?>">
                          <i class="menu-icon mdi mdi-logout "></i>
                          <span class="menu-title">Logout</span>
                      </a>
                  </li>
              </ul>
          </nav>
          <!-- partial -->