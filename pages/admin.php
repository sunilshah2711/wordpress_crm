<?php
    ob_start();
    //admin menu page function
    function admin()
    {
    ?>
    <style>
        body
        {
            background-color:#f1f1f2;
        }
    </style>
      
                <!-- Single Item -->
                <div class="tile mt-4" id="tile-1">
                    <ul class="nav nav-tabs nav-justified container"  id="myTab" role="tablist">
                        <div class="slider"></div>

                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="appearance-tab" data-bs-toggle="tab" data-bs-target="#appearance-tab-pane" type="button" role="tab" aria-controls="appearance-tab-pane" aria-selected="false"><i class="fa-solid fa-brush"></i> Appearance</a>
                        </li>

                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="user-tab" data-bs-toggle="tab" data-bs-target="#user-tab-pane" type="button" role="tab" aria-controls="user-tab-pane" aria-selected="false"><i class="fa-solid fa-user"></i>Users</a>
                        </li>

                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="tools-tab" data-bs-toggle="tab" data-bs-target="#tools-tab-pane" type="button" role="tab" aria-controls="tools-tab-pane" aria-selected="false"><i class="fa-solid fa-screwdriver-wrench"></i>Tools</a>
                        </li>

                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="plugins-tab" data-bs-toggle="tab" data-bs-target="#plugins-tab-pane" type="button" role="tab" aria-controls="plugins-tab-pane" aria-selected="false"><i class="fa-solid fa-puzzle-piece"></i>Plugins</a>
                        </li>

                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="settings-tab" data-bs-toggle="tab" data-bs-target="#settings-tab-pane" type="button" role="tab" aria-controls="settings-tab-pane" aria-selected="false"><i class="fa-solid fa-sliders"></i>Settings</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">

                        <div class="tab-pane fade  show active" id="appearance-tab-pane" role="tabpanel" aria-labelledby="appearance-tab" tabindex="0"><div class="we-offer-area text-center">
                            <div class="container">
                                    <div class="row our-offer-items less-carousel">
                                        <!-- Single Item -->
                                        <div class="col-md-4 col-sm-6 equal-height">
                                        <a href="themes.php">
                                                <div class="item">
                                                <i class="fa-brands fa-perbyte"></i>
                                                    <h4>Themes</h4>
                                                </div>
                                            </a>
                                        </div>
                                        <!-- End Single Item --> 

                                         <!-- Single Item -->
                                         <div class="col-md-4 col-sm-6 equal-height">
                                            <a href="site-editor.php">
                                                <div class="item">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                                    <h4>Editor </h4>
                                                </div>
                                            </a>
                                        </div>
                                        <!-- End Single Item --> 
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="user-tab-pane" role="tabpanel" aria-labelledby="user-tab" tabindex="0"><div class="we-offer-area text-center">
                            <div class="container">
                                    <div class="row our-offer-items less-carousel">
                                        <!-- Single Item -->
                                        <div class="col-md-4 col-sm-6 equal-height">
                                        <a href="users.php">
                                                <div class="item">
                                                <i class="fa-solid fa-users"></i>
                                                    <h4>All Users</h4>
                                                </div>
                                            </a>
                                        </div>
                                        <!-- End Single Item --> 

                                         <!-- Single Item -->
                                         <div class="col-md-4 col-sm-6 equal-height">
                                            <a href="user-new.php">
                                                <div class="item">
                                                <i class="fa-solid fa-user-plus"></i>
                                                    <h4>Add New </h4>
                                                </div>
                                            </a>
                                        </div>
                                        <!-- End Single Item --> 

                                          <!-- Single Item -->
                                          <div class="col-md-4 col-sm-6 equal-height">
                                            <a href="profile.php">
                                                <div class="item">
                                                <i class="fa-solid fa-address-card"></i>
                                                    <h4>Profile </h4>
                                                </div>
                                            </a>
                                        </div>
                                        <!-- End Single Item --> 
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="tools-tab-pane" role="tabpanel" aria-labelledby="tools-tab" tabindex="0"><div class="we-offer-area text-center">
                            <div class="container">
                                    <div class="row our-offer-items less-carousel">
                                        <!-- Single Item -->
                                        <div class="col-md-4 col-sm-6 equal-height">
                                        <a href="tools.php">
                                                <div class="item">
                                                <i class="fa-sharp fa-solid fa-screwdriver-wrench"></i>
                                                    <h4>Available Tools</h4>
                                                </div>
                                            </a>
                                        </div>
                                        <!-- End Single Item --> 

                                         <!-- Single Item -->
                                         <div class="col-md-4 col-sm-6 equal-height">
                                            <a href="import.php">
                                                <div class="item">
                                                <i class="fa-solid fa-file-import"></i>
                                                    <h4>Import</h4>
                                                </div>
                                            </a>
                                        </div>
                                        <!-- End Single Item --> 

                                          <!-- Single Item -->
                                          <div class="col-md-4 col-sm-6 equal-height">
                                            <a href="export.php">
                                                <div class="item">
                                                <i class="fa-solid fa-file-export"></i>
                                                    <h4>Export </h4>
                                                </div>
                                            </a>
                                        </div>
                                        <!-- End Single Item --> 

                                        <!-- Single Item -->
                                        <div class="col-md-4 col-sm-6 equal-height">
                                            <a href="site-health.php">
                                                <div class="item">
                                                <i class="fa-solid fa-house-medical"></i>
                                                    <h4>Site Health  </h4>
                                                </div>
                                            </a>
                                        </div>
                                        <!-- End Single Item --> 

                                        <!-- Single Item -->
                                        <div class="col-md-4 col-sm-6 equal-height">
                                            <a href="export-personal-data.php">
                                                <div class="item">
                                                <i class="fa-solid fa-download"></i>
                                                    <h4>Export Personal Data </h4>
                                                </div>
                                            </a>
                                        </div>
                                        <!-- End Single Item --> 

                                        <!-- Single Item -->
                                        <div class="col-md-4 col-sm-6 equal-height">
                                            <a href="erase-personal-data.php">
                                                <div class="item">
                                                <i class="fa-solid fa-eraser"></i>
                                                    <h4>Erase Personal Data </h4>
                                                </div>
                                            </a>
                                        </div>
                                        <!-- End Single Item --> 

                                        <!-- Single Item -->
                                            <div class="col-md-4 col-sm-6 equal-height">
                                                <a href="theme-editor.php">
                                                    <div class="item">
                                                    <i class="fa-solid fa-file-pen"></i>
                                                        <h4>Theme File Editor </h4>
                                                    </div>
                                                </a>
                                            </div>
                                        <!-- End Single Item --> 

                                        <!-- Single Item -->
                                            <div class="col-md-4 col-sm-6 equal-height">
                                                <a href="plugin-editor.php">
                                                    <div class="item">
                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                        <h4>Plugin File Editor </h4>
                                                    </div>
                                                </a>
                                            </div>
                                        <!-- End Single Item --> 
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="plugins-tab-pane" role="tabpanel" aria-labelledby="plugins-tab" tabindex="0"><div class="we-offer-area text-center">
                                <div class="container">
                                    <div class="row our-offer-items less-carousel">
                                        <!-- Single Item -->
                                        <div class="col-md-4 col-sm-6 equal-height">
                                            <a href="plugins.php">
                                                <div class="item">
                                                    <i class="fa-brands fa-perbyte"></i>
                                                    <h4>Installed Plugins</h4>
                                                </div>
                                            </a>
                                        </div>
                                        <!-- End Single Item -->

                                        <!-- Single Item -->
                                        <div class="col-md-4 col-sm-6 equal-height">
                                            <a href="plugin-install.php">
                                                <div class="item">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                    <h4>Add New</h4>
                                                </div>
                                            </a>
                                        </div>
                                        <!-- End Single Item -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="settings-tab-pane" role="tabpanel" aria-labelledby="settings-tab" tabindex="0"><div class="we-offer-area text-center">
                                <div class="container">
                                    <div class="row our-offer-items less-carousel">
                                        <!-- Single Item -->
                                        <div class="col-md-4 col-sm-6 equal-height">
                                            <a href="options-general.php">
                                                <div class="item">
                                                    <i class="fa-sharp fa-solid fa-screwdriver-wrench"></i>
                                                    <h4>General</h4>
                                                </div>
                                            </a>
                                        </div>
                                        <!-- End Single Item -->

                                        <!-- Single Item -->
                                        <div class="col-md-4 col-sm-6 equal-height">
                                            <a href="options-writing.php">
                                                <div class="item">
                                                    <i class="fa-solid fa-pen"></i>
                                                    <h4>Writing</h4>
                                                </div>
                                            </a>
                                        </div>
                                        <!-- End Single Item -->

                                        <!-- Single Item -->
                                        <div class="col-md-4 col-sm-6 equal-height">
                                            <a href="options-reading.php">
                                                <div class="item">
                                                    <i class="fa-solid fa-book-open"></i>
                                                    <h4>Reading</h4>
                                                </div>
                                            </a>
                                        </div>
                                        <!-- End Single Item -->

                                        <!-- Single Item -->
                                        <div class="col-md-4 col-sm-6 equal-height">
                                            <a href="options-discussion.php">
                                                <div class="item">
                                                    <i class="fa-solid fa-users"></i>
                                                    <h4>Discussion</h4>
                                                </div>
                                            </a>
                                        </div>
                                        <!-- End Single Item -->

                                        <!-- Single Item -->
                                        <div class="col-md-4 col-sm-6 equal-height">
                                            <a href="options-media.php">
                                                <div class="item">
                                                    <i class="fa-solid fa-download"></i>
                                                    <h4>Media</h4>
                                                </div>
                                            </a>
                                        </div>
                                        <!-- End Single Item -->

                                        <!-- Single Item -->
                                        <div class="col-md-4 col-sm-6 equal-height">
                                            <a href="options-permalink.php">
                                                <div class="item">
                                                    <i class="fa-solid fa-link"></i>
                                                    <h4>Permalinks</h4>
                                                </div>
                                            </a>
                                        </div>
                                        <!-- End Single Item -->

                                        <!-- Single Item -->
                                        <div class="col-md-4 col-sm-6 equal-height">
                                            <a href="options-privacy.php">
                                                <div class="item">
                                                    <i class="fa-solid fa-file-pen"></i>
                                                    <h4>Privacy</h4>
                                                </div>
                                            </a>
                                        </div>
                                        <!-- End Single Item -->
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
    </section>
    <?php
    }
?>