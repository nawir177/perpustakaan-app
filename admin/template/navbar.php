<header id="header" class="navbar navbar-expand-lg navbar-fixed navbar-height navbar-container navbar-bordered " style="background-color: #007020;">
  <div class="navbar-nav-wrap">
    <!-- Logo -->
    <button class="navbar-brand" href="../index.html" aria-label="Front">
      <img class="navbar-brand-logo" src="../template/dist/assets/svg/logos/logo.svg" alt="Logo" data-hs-theme-appearance="default">
      <img class="navbar-brand-logo" src="../template/dist/assets/svg/logos-light/logo.svg" alt="Logo" data-hs-theme-appearance="dark">
      <img class="navbar-brand-logo-mini" src="../template/dist/assets/svg/logos/logo-short.svg" alt="Logo" data-hs-theme-appearance="default">
      <img class="navbar-brand-logo-mini" src="../template/dist/assets/svg/logos-light/logo-short.svg" alt="Logo" data-hs-theme-appearance="dark">
    </button>
    <!-- End Logo -->

    <div class="navbar-nav-wrap-content-start">
      <!-- Navbar Vertical Toggle -->
      <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-aside-toggler">
        <i class="bi-arrow-bar-left navbar-toggler-short-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Collapse"></i>
        <i class="bi-arrow-bar-right navbar-toggler-full-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Expand"></i>
      </button>

      <!-- End Navbar Vertical Toggle -->



      <!-- End Search Form -->
    </div>

    <div class="navbar-nav-wrap-content-end">
      <!-- Navbar -->
      <ul class="navbar-nav">

        <li class="nav-item d-none d-sm-inline-block">
          <!-- Notification -->
          <div class="dropdown">
            <button type="button" class="btn btn-light btn-icon rounded-circle" id="navbarNotificationsDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation>
              <i class="bi-bell"></i>
              <span class="btn-status btn-sm-status btn-status-danger"></span>
            </button>

            <div class="dropdown-menu dropdown-menu-end dropdown-card navbar-dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="navbarNotificationsDropdown" style="width: 25rem;">
              <div class="card">
                <!-- Header -->
                <div class="card-header card-header-content-between">
                  <h4 class="card-title mb-0">Notifications</h4>

                  <!-- Unfold -->
                  <div class="dropdown">
                    <button type="button" class="btn btn-icon btn-sm btn-ghost-secondary rounded-circle" id="navbarNotificationsDropdownSettings" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="bi-three-dots-vertical"></i>
                    </button>

                  </div>
                  <!-- End Unfold -->
                </div>
                <!-- End Header -->
                <!-- Body -->
                <div class="card-body-height">
                  <!-- Tab Content -->
                  <div class="tab-content" id="notificationTabContent">
                    <div class="tab-pane fade show active" id="notificationNavOne" role="tabpanel" aria-labelledby="notificationNavOne-tab">
                      <!-- List Group -->
                      <ul class="list-group list-group-flush navbar-card-list-group">
                        <?php
                        foreach ($notification as $notif) :
                        ?>
                          <!-- Item -->
                          <li class="list-group-item form-check-select">
                            <div class="row">
                              <div class="col-auto">
                                <div class="d-flex align-items-center">

                                  <div class="avatar avatar-sm avatar-circle">
                                    <img class="avatar-img" src="../<?=show('anggota',$notif['anggota_id'])['foto']?>" alt="Image Description">
                                  </div>
                                </div>
                              </div>
                              <!-- End Col -->

                              <div class="col ms-n2">
                                <h5 class="mb-1"><?=show('anggota',$notif['anggota_id'])['nama']?></h5>
                                <p class="text-body fs-5"><?=$notif['content']?></p>
                              </div>
                              <!-- End Col -->

                              <small class="col-auto text-muted text-cap"><?=timeAgo($notif['time'])?></small>
                              <!-- End Col -->
                            </div>
                            <!-- End Row -->

                            <a class="stretched-link" href="#"></a>
                          </li>

                        <?php
                        endforeach;
                        ?>
                        <!-- End Item -->
                      </ul>
                      <!-- End List Group -->
                    </div>
                  </div>
                  <!-- End Tab Content -->
                </div>
                <!-- End Body -->

                <!-- Card Footer -->
                <a class="card-footer text-center" href="#">
                  View all notifications <i class="bi-chevron-right"></i>
                </a>
                <!-- End Card Footer -->
              </div>
            </div>
          </div>
          <!-- End Notification -->
        </li>
        <li class="nav-item">
          <!-- Account -->
          <div class="dropdown">
            <a class="navbar-dropdown-account-wrapper" href="javascript:;" id="accountNavbarDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" data-bs-dropdown-animation>
              <div class="avatar avatar-sm avatar-circle">
                <img class="avatar-img" src="../assets/image/user.png" alt="Image Description">
                <span class="avatar-status avatar-sm-status avatar-status-success"></span>
              </div>
            </a>

            <div id="selectThemeDropdown" class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless navbar-dropdown-account" aria-labelledby="accountNavbarDropdown" style="width: 16rem;">
              <div class="dropdown-item-text">
                <div class="d-flex align-items-center">
                  <div class="avatar avatar-sm avatar-circle">
                    <img class="avatar-img" src="../assets/image/user.png" alt="Image Description">
                  </div>
                  <div class="flex-grow-1 ms-3">
                    <h5 class="mb-0"><?= $userAuth['nama']; ?></h5>
                    <p class="card-text text-body"><?= $userAuth['username']; ?></p>
                  </div>
                </div>
              </div>
              <div class="dropdown-divider"></div>

              <!-- Dropdown -->
              <div class="dropdown">



                <form action="" method="post">
                  <a class="dropdown-item" href="../logout.php">Logout</a>
                </form>
              </div>
            </div>
            <!-- End Account -->
        </li>
      </ul>
      <!-- End Navbar -->
    </div>
  </div>
</header>
<?php



?>