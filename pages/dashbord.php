<?php
    ob_start();
    //admin menu page function
    function dashbord()
    {
    ?>
      <section class="we-offer-area text-center bg-gray">
        <div class="container">
           
                <div class="row our-offer-items less-carousel">
                    

                    <!-- Single Item -->
                    <div class="col-md-4 col-sm-6 equal-height">
                    <a href="admin.php?page=inbox">
                            <div class="item">
                            <i class="fa-solid fa-envelope"></i>
                                <h4>Inbox</h4>
                            </div>
                        </a>
                    </div>
                    <!-- End Single Item -->

                     <!-- Single Item -->
                     <div class="col-md-4 col-sm-6 equal-height">
                    <a href="admin.php?page=contact">
                            <div class="item">
                            <i class="fa-regular fa-address-book"></i>
                                <h4>Contacts</h4>
                            </div>
                        </a>
                    </div>
                    <!-- End Single Item -->
                    <!-- Single Item -->
                    <div class="col-md-4 col-sm-6 equal-height">
                    <a href="admin.php?page=tasks">
                            <div class="item">
                            <i class="fa-solid fa-list-check"></i>
                                <h4>Tasks</h4>
                            </div>
                        </a>
                    </div>
                    <!-- End Single Item -->

                    <!-- Single Item -->
                    <div class="col-md-4 col-sm-6 equal-height">
                    <a href="admin.php?page=meetings">
                            <div class="item">
                                <i class="fas fa-headset"></i>
                                <h4>Meetings</h4>
                            </div>
                        </a>
                    </div>
                    <!-- End Single Item -->

                    <!-- Single Item -->
                    <div class="col-md-4 col-sm-6 equal-height">
                    <a href="admin.php?page=companies">
                            <div class="item">
                            <i class="fa-solid fa-building"></i>
                                <h4>Companies</h4>
                            </div>
                        </a>
                    </div>
                    <!-- End Single Item -->

                    <!-- Single Item -->
                    <div class="col-md-4 col-sm-6 equal-height">
                    <a href="admin.php?page=opportunities">
                            <div class="item">
                            <i class="fa-solid fa-lightbulb"></i>
                                <h4>Opportunities</h4>
                            </div>
                        </a>
                    </div>
                    <!-- End Single Item -->

                    <!-- Single Item -->
                    <div class="col-md-4 col-sm-6 equal-height">
                        <a href="admin.php?page=reports">
                            <div class="item">
                            <i class="fa-solid fa-square-poll-vertical"></i>
                                <h4>Reports</h4>
                            </div>
                        </a>
                    </div>
                    <!-- End Single Item -->

                      <!-- Single Item -->
                      <div class="col-md-4 col-sm-6 equal-height">
                        <a href="admin.php?page=starred">
                            <div class="item">
                            <i class="fa-sharp fa-solid fa-circle-play"></i>
                                <h4>Starred</h4>
                            </div>
                        </a>
                    </div>
                    <!-- End Single Item -->

                      <!-- Single Item -->
                      <div class="col-md-4 col-sm-6 equal-height">
                        <a href="admin.php?page=trash">
                            <div class="item">
                            <i class="fa-solid fa-trash"></i>
                                <h4>trash </h4>
                            </div>
                        </a>
                    </div>
                    <!-- End Single Item -->
                </div>
        </div>
    </section>
    <?php
    }
?>