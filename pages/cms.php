<?php
    ob_start();
    //admin menu page function
    function cms()
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
            <ul class="nav nav-tabs nav-justified container" id="myTab" role="tablist">
                <div class="slider"></div>
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true"><i class="fa-solid fa-thumbtack"></i> Posts</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false"><i class="fa-solid fa-icons"></i> Media</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false"><i class="fa-solid fa-clone"></i> Pages</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="disabled-tab" data-bs-toggle="tab" data-bs-target="#disabled-tab-pane" type="button" role="tab" aria-controls="disabled-tab-pane" aria-selected="false"><i class="fa-solid fa-comment"></i> Comments</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">

                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                    <div class="we-offer-area text-center">
                        <div class="container">

                            <div class="row our-offer-items less-carousel">
                                <!-- Single Item -->
                                <div class="col-md-4 col-sm-6 equal-height">
                                    <a href="edit.php">
                                        <div class="item">
                                            <i class="fa-solid fa-envelope"></i>
                                            <h4>All Posts</h4>
                                        </div>
                                    </a>
                                </div>
                                <!-- End Single Item -->

                                <!-- Single Item -->
                                <div class="col-md-4 col-sm-6 equal-height">
                                    <a href="post-new.php">
                                        <div class="item">
                                            <i class="fa-solid fa-plus"></i>
                                            <h4>Add New</h4>
                                        </div>
                                    </a>
                                </div>
                                <!-- End Single Item -->

                                <!-- Single Item -->
                                <div class="col-md-4 col-sm-6 equal-height">
                                    <a href="edit-tags.php?taxonomy=category">
                                        <div class="item">
                                            <i class="fa-solid fa-list"></i>
                                            <h4>Categories</h4>
                                        </div>
                                    </a>
                                </div>
                                <!-- End Single Item -->

                                <!-- Single Item -->
                                <div class="col-md-4 col-sm-6 equal-height">
                                    <a href="edit-tags.php?taxonomy=post_tag">
                                        <div class="item">
                                            <i class="fa-solid fa-tag"></i>
                                            <h4>Tags</h4>
                                        </div>
                                    </a>
                                </div>
                                <!-- End Single Item -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                    <div class="we-offer-area text-center">
                        <div class="container">
                            <div class="row our-offer-items less-carousel">
                                <!-- Single Item -->
                                <div class="col-md-4 col-sm-6 equal-height">
                                    <a href="upload.php">
                                        <div class="item">
                                            <i class="fa-solid fa-photo-film"></i>
                                            <h4>Library</h4>
                                        </div>
                                    </a>
                                </div>
                                <!-- End Single Item -->

                                <!-- Single Item -->
                                <div class="col-md-4 col-sm-6 equal-height">
                                    <a href="media-new.php">
                                        <div class="item">
                                            <i class="fa-solid fa-plus"></i>
                                            <h4>Add New</h4>
                                        </div>
                                    </a>
                                </div>
                                <!-- End Single Item -->

                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                    <div class="we-offer-area text-center">
                        <div class="container">
                            <div class="row our-offer-items less-carousel">
                                <!-- Single Item -->
                                <div class="col-md-4 col-sm-6 equal-height">
                                    <a href="edit.php?post_type=page">
                                        <div class="item">
                                            <i class="fa-solid fa-file"></i>
                                            <h4>All Pages</h4>
                                        </div>
                                    </a>
                                </div>
                                <!-- End Single Item -->

                                <!-- Single Item -->
                                <div class="col-md-4 col-sm-6 equal-height">
                                    <a href="post-new.php?post_type=page">
                                        <div class="item">
                                            <i class="fa-solid fa-file-circle-plus"></i>
                                            <h4>Add New</h4>
                                        </div>
                                    </a>
                                </div>
                                <!-- End Single Item -->

                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0"><div class="we-offer-area text-center">
                        <div class="container">
                            <div class="row our-offer-items less-carousel">
                                <!-- Single Item -->
                                <div class="col-md-4 col-sm-6 equal-height">
                                    <a href="edit-comments.php">
                                        <div class="item">
                                            <i class="fa-solid fa-comments"></i>
                                            <h4>Comments</h4>
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