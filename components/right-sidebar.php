<?php
   $table_name1 = $wpdb->prefix . 'user_settings_table';

    $usersettingc=$wpdb->get_results("SELECT count(*) as total from $table_name1");
    $userdata=json_decode(json_encode($usersettingc), true);

    if (isset($_GET['filterpin'])){
        if($userdata[0]['total'] == 0){
            $wpdb->query("INSERT INTO $table_name1(is_filter_pin) VALUES(1)");
            echo "<script>location.replace('admin.php?page=contact');</script>";
        }else{
            $getdata = $wpdb->get_results("SELECT * FROM $table_name1");
            $my_array = json_decode(json_encode($getdata), true);
            //  echo '<pre>';
            // print_r($my_array[0]['is_filter_pin']);
            // echo '</pre>';
            // die;
            if($my_array[0]['is_filter_pin'] == '0'){
                $wpdb->query("UPDATE $table_name1 SET is_filter_pin=1 WHERE id='1'");
            }else{
                $wpdb->query("UPDATE $table_name1 SET is_filter_pin=0 WHERE id='1'");
            }
            echo "<script>location.replace('admin.php?page=contact');</script>";
        }
    }

    $usersetting = $wpdb->get_results("SELECT * FROM $table_name1");
    $my_array1 = json_decode(json_encode($usersetting), true);

    if(isset($my_array1[0]['is_filter_pin'])){
        if ($my_array1[0]['is_filter_pin'] == 1) {
            echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                var myModal = new bootstrap.Offcanvas(document.getElementById('offcanvasRight'), {})
                myModal.toggle()
              });
               
            </script>";

            echo "<style>
            #wpcontent, #wpfooter{
                margin-right: 400px !important;
            }
            </style>";
        }
    }
   

?>

<div class="right-sidebar">
    <!-- <button class="btn btn-run-cozlor mr-2 mt-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="fa-light fa-filter"></i></button> -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel"<?php echo( isset($my_array1[0]['is_filter_pin']) ? ($my_array1[0]['is_filter_pin'] == 1 ?  'data-bs-scroll="true" data-bs-backdrop="false"' :  '') : '') ?> >
        <div class="offcanvas-header py-1">
            <h5 class="offcanvas-title" id="offcanvasRightLabel">View Settings</h5>
            <div class="d-flex align-items-center">
            <form action='' method='get'>
                <input type="hidden" name="page" value="contact"/>
                <input type="hidden" name="filterpin" value="1"/>
                <button id='pinsubmit' name='pinsubmit' type='submit' class="btn btn-nonebacground">
                    <?php 
                     if(isset($my_array1[0]['is_filter_pin'])){
                        if($my_array1[0]['is_filter_pin'] == 1){
                        ?>
                            <i class="fa-solid fa-thumbtack"></i>
                    <?php
                        }else{
                            ?>
                           <i class="fa-regular fa-thumbtack"></i>
                            <?php
                        }
                    }else{
                        ?>
                       <i class="fa-regular fa-thumbtack"></i>
                        <?php
                    }
                    ?>
                </button>
            </form>
                <?php 
                  if(isset($my_array1[0]['is_filter_pin'])){
                    if($my_array1[0]['is_filter_pin'] == 1){

                    }else{
                        ?>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        <?php
                    }
                    }else{
                    ?>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    <?php
                        }
                    ?>

            </div>
        </div>
        <div class="offcanvas-body px-0">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item mb-0 px-3" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Filters</button>
                </li>
                <li class="nav-item mb-0 px-3" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Columns</button>
                </li>
                <li class="nav-item mb-0 px-3" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Groups</button>
                </li>
            </ul>
            <div class="tab-content p-3" id="myTabContent">
                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                    
                    <form action='' method='get'>
                        <input type="hidden" name="page" value="contact"/>
                            <label>
                                <input type="checkbox" name="unassigned" <?php if(isset($_GET['unassigned']) && $_GET['unassigned'] == 'on') { echo 'checked'; } ?> />
                                Unassigned
                            </label>
                            <label>
                                <input type="checkbox" name="unread" <?php if(isset($_GET['unread']) && $_GET['unread'] == 'on') { echo 'checked'; } ?> />
                                Unread
                            </label>
                            <label>
                                <input type="checkbox" name="unchanged" <?php if(isset($_GET['unchanged']) && $_GET['unchanged'] == 'on') { echo 'checked'; } ?> />
                                Unchanged
                            </label>
                            <label>
                                <input type="checkbox" name="ncalltime" <?php if(isset($_GET['ncalltime']) && $_GET['ncalltime'] == 'on') { echo 'checked'; } ?>/>
                                No Comment - All Time
                            </label>
                            <label>
                                <input type="checkbox" name="nclast7days" <?php if(isset($_GET['nclast7days']) && $_GET['nclast7days'] == 'on') { echo 'checked'; } ?>/>
                                No Comment - Last 7 Days
                            </label>
                            <label>
                                <input type="checkbox" name="nclast30days" <?php if(isset($_GET['nclast30days']) && $_GET['nclast30days'] == 'on') { echo 'checked'; } ?>/>
                                No Comment - Last 30 Days
                            </label>
                            <label>
                                <input type="checkbox" name="smalltime" <?php if(isset($_GET['smalltime']) && $_GET['smalltime'] == 'on') { echo 'checked'; } ?>/>
                                Some Comment - All Time
                            </label>
                            <label>
                                <input type="checkbox" name="smlast7days" <?php if(isset($_GET['smlast7days']) && $_GET['smlast7days'] == 'on') { echo 'checked'; } ?>/>
                                Some Comment - Last 7 Days
                            </label>
                            <label>
                                <input type="checkbox" name="smlast30days" <?php if(isset($_GET['smlast30days']) && $_GET['smlast30days'] == 'on') { echo 'checked'; } ?>/>
                                Some Comment - Last 30 Days
                            </label>
                            <label>
                                <input type="checkbox" name="npalltime" <?php if(isset($_GET['npalltime']) && $_GET['npalltime'] == 'on') { echo 'checked'; } ?>/>
                                No Status Updates - All Time
                            </label>
                            <label>
                                <input type="checkbox" name="nplast7days" <?php if(isset($_GET['nplast7days']) && $_GET['nplast7days'] == 'on') { echo 'checked'; } ?>/>
                                No Status Updates - Last 7 Days
                            </label>
                            <label>
                                <input type="checkbox" name="nplast30days" <?php if(isset($_GET['nplast30days']) && $_GET['nplast30days'] == 'on') { echo 'checked'; } ?> />
                                No Status Updates - Last 30 Days
                            </label>

                            <button id='filsubmit' name='filsubmit' type='submit' class='btn btn-run-color mt-3'>Run</button>
                    </form>
                </div>
                <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">Columns</div>
                <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">Groups</div>
            </div>
        </div>
    </div>
</div>