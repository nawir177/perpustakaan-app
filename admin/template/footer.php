            </div>
            </div>
            <!-- End Row -->
            </div>
            <!-- End Content -->
            </main>
            <!-- ========== END MAIN CONTENT ========== -->

            <!-- ========== SECONDARY CONTENTS ========== -->
            <!-- Welcome Message -->
            <div class="modal fade" id="welcomeMessageModal" tabindex="-1" aria-hidden="true">
               <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                     <!-- Header -->
                     <div class="modal-close">
                        <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm" data-bs-dismiss="modal" aria-label="Close">
                           <i class="bi-x-lg"></i>
                        </button>
                     </div>
                     <!-- End Header -->

                     <!-- Body -->
                     <div class="modal-body p-sm-5">
                        <div class="text-center">
                           <div class="w-75 w-sm-50 mx-auto mb-4">
                              <img class="img-fluid" src="../template/dist/assets/svg/illustrations/oc-collaboration.svg" alt="Image Description" data-hs-theme-appearance="default">
                              <img class="img-fluid" src="../template/dist/assets/svg/illustrations-light/oc-collaboration.svg" alt="Image Description" data-hs-theme-appearance="dark">
                           </div>

                           <h4 class="h1">Welcome to Front</h4>

                           <p>We're happy to see you in our community.</p>
                        </div>
                     </div>
                     <!-- End Body -->

                     <!-- Footer -->
                     <div class="modal-footer d-block text-center py-sm-5">
                        <small class="text-cap text-muted">Trusted by the world's best teams</small>

                        <div class="w-85 mx-auto">
                           <div class="row justify-content-between">
                              <div class="col">
                                 <img class="img-fluid" src="../template/dist/assets/svg/brands/gitlab-gray.svg" alt="Image Description">
                              </div>
                              <div class="col">
                                 <img class="img-fluid" src="../template/dist/assets/svg/brands/fitbit-gray.svg" alt="Image Description">
                              </div>
                              <div class="col">
                                 <img class="img-fluid" src="../template/dist/assets/svg/brands/flow-xo-gray.svg" alt="Image Description">
                              </div>
                              <div class="col">
                                 <img class="img-fluid" src="../template/dist/assets/svg/brands/layar-gray.svg" alt="Image Description">
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- End Footer -->
                  </div>
               </div>
            </div>

            <!-- End Welcome Message -->
            <!-- ========== END SECONDARY CONTENTS ========== -->
            <script src="../template/dist/assets/vendor/chart.js/dist/Chart.min.js"></script>
            <!-- JS Global Compulsory  -->
            <script src="../template/dist/assets/vendor/jquery/dist/jquery.min.js"></script>
            <script src="../template/dist/assets/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
            <script src="../template/dist/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
            <script src="../template/dist/assets/vendor/chart.js/dist/chart.min.js"></script>
          

            <script src="../template/dist/assets/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside.min.js"></script>
            <script src="../template/dist/assets/vendor/hs-form-search/dist/hs-form-search.min.js"></script>

            <!-- JS Front -->


            <!-- data table -->
            <script type="text/javascript" src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
            <script type="text/javascript" src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
            <script type="text/javascript">
               new DataTable('.table');
            </script>
            <!-- JS Plugins Init. -->
            <script>
               (function() {
                  // INITIALIZATION OF NAVBAR VERTICAL ASIDE
                  // =======================================================
                  new HSSideNav('.js-navbar-vertical-aside').init()


                  // INITIALIZATION OF BOOTSTRAP DROPDOWN
                  // =======================================================
                  HSBsDropdown.init()


                  // INITIALIZATION OF FORM SEARCH
                  // =======================================================
                  new HSFormSearch('.js-form-search')
               })()
            </script>

            <!-- Style Switcher JS -->

            <script>
               (function() {
                  // STYLE SWITCHER
                  // =======================================================
                  const $dropdownBtn = document.getElementById('selectThemeDropdown') // Dropdowon trigger
                  const $variants = document.querySelectorAll(`[aria-labelledby="selectThemeDropdown"] [data-icon]`) // All items of the dropdown

                  // Function to set active style in the dorpdown menu and set icon for dropdown trigger
                  const setActiveStyle = function() {
                     $variants.forEach($item => {
                        if ($item.getAttribute('data-value') === HSThemeAppearance.getOriginalAppearance()) {
                           $dropdownBtn.innerHTML = `<i class="${$item.getAttribute('data-icon')}" />`
                           return $item.classList.add('active')
                        }

                        $item.classList.remove('active')
                     })
                  }

                  // Add a click event to all items of the dropdown to set the style
                  $variants.forEach(function($item) {
                     $item.addEventListener('click', function() {
                        HSThemeAppearance.setAppearance($item.getAttribute('data-value'))
                     })
                  })

                  // Call the setActiveStyle on load page
                  setActiveStyle()

                  // Add event listener on change style to call the setActiveStyle function
                  window.addEventListener('on-hs-appearance-change', function() {
                     setActiveStyle()
                  })
               })()

               (function() {
                  // INITIALIZATION OF CHARTJS
                  // =======================================================
                  document.querySelectorAll('.js-chart').forEach(item => {
                     HSCore.components.HSChartJS.init(item)
                  })
               });
            </script>
            

            <!-- End Style Switcher JS -->
            </body>

            </html>