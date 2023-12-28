  <div class="container-scroller">
      <div class="container-fluid page-body-wrapper">
          <!-- partial:partials/_sidebar.html -->
          <nav class="sidebar sidebar-offcanvas" id="sidebar">
              <ul class="nav">
                  <li class="nav-item">
                      <a class="nav-link" href="<?php echo base_url('/Admin')?>">
                          <i class="mdi mdi-grid-large menu-icon"></i>
                          <span class="menu-title">Dashboard</span>
                      </a>
                  </li>
                  <li class="nav-item nav-category">User</li>
                  <li class="nav-item">
                      <a class="nav-link" data-bs-toggle="collapse" href="#user" aria-expanded="false" aria-controls="ui-basic">
                          <i class="menu-icon mdi mdi-account-circle-outline"></i>
                          <span class="menu-title">User</span>
                          <?php

                            if ($count[0]->total == 0) {
                            } else { ?>
                              <span class="badge badge-primary">
                                  <?php echo $count[0]->total; ?>
                              </span>
                          <?php } ?>
                          <i class="menu-arrow"></i>
                      </a>
                      <div class="collapse" id="user">
                          <ul class="nav flex-column sub-menu">
                              <li class="nav-item">
                                  <a class="nav-link" href="<?php echo base_url('/newuser')?>">
                                      <p>
                                          Pendaftar &nbsp;&nbsp;&nbsp;
                                          <?php if ($count[0]->total > 0) { ?>
                                              <span class="badge-danger">
                                                  <?php echo $count[0]->total; ?>
                                              </span>
                                          <?php } ?>
                                      </p>
                                  </a>
                              </li>


                              <li class="nav-item"> <a class="nav-link" href="<?php echo base_url('/user')?>">Kelola User</a></li>
                          </ul>
                      </div>
                  </li>
                  <li class="nav-item nav-category">Peminjaman</li>
                  <li class="nav-item">
                      <a class="nav-link" data-bs-toggle="collapse" href="#menu" aria-expanded="false" aria-controls="form-elements">
                          <i class="menu-icon  mdi mdi-bookmark "></i>
                          <span class="menu-title">Kelola Peminjam</span>
                          <i class="menu-arrow"></i>
                      </a>
                      <div class="collapse" id="menu">
                          <ul class="nav flex-column sub-menu">
                              <li class="nav-item"><a class="nav-link" href="<?php echo base_url('/peminjaman')?>">Peminjaman</a></li>
                              <li class="nav-item"><a class="nav-link" href="<?php echo base_url('/jadwal')?>">Jadwal</a></li>
                          </ul>
                      </div>
                  </li>

                  <li class="nav-item nav-category">Pengaturan</li>
                  <li class="nav-item">
                      <a class="nav-link" data-bs-toggle="collapse" href="/pengaturan" aria-expanded="false" aria-controls="auth">
                          <i class="menu-icon mdi mdi-account-settings "></i>
                          <span class="menu-title">Profil</span>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="<?php echo base_url('/ruangan'); ?>" >
                          <i class="menu-icon mdi mdi-settings"></i>
                          <span class="menu-title">Ruangan</span>
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