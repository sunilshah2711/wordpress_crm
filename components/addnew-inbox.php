<?php 

$table_name_users = $wpdb->prefix . 'users';
$users1 = $wpdb->get_results("SELECT * FROM $table_name_users");
$users = json_decode(json_encode($users1), true);
// echo '<pre>';
// print_r($users1);
// echo '</pre>';
// die;
?>

<div class="right-sidebar mx-1">
<!-- Button trigger modal -->
    <div class="d-flex align-items-center">
        <h4 class="mt-2 mb-0 p-0 me-3">Contact</h4>
        <button type="button" class="btn btn-run-color mt-2" data-bs-toggle="offcanvas" data-bs-target="#exampleRight"  aria-controls="exampleRight">
        <i class="fa-solid fa-plus"></i>
        </button>
    </div>

    <!-- Modal -->
    <div class="offcanvas offcanvas-end" id="exampleRight" tabindex="-1" aria-labelledby="exampleRightLabel" >

            <form action="" method="post">
            <div class="offcanvas-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Contact</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Johan Doe">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Mobile No</label>
                        <input type="tel" class="form-control" name="mobile_no" id="phone" placeholder="+1234567890">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Assigned to</label>
                        <select class="form-select" name="user_id" aria-label="Assigned to">
                        <option selected value="">Select Assigned to</option>
                            <?php
                            foreach($users as $users2)
                            {   
                                echo"<option value=".$users2['ID'].">".$users2['display_name']."</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Lifecycle stage</label>
                        <select class="form-select" name="lifecyclestage" aria-label="Assigned to">
                            <option value="lead">Lead</option>
                            <option value="opportunities">opportunities</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="text" class="form-label">Description</label>
                        <textarea class="form-control" id="text" name="description" rows="3"></textarea>
                    </div>
                    <div class="d-flex mt-4">
                        <button type="button" class="btn btn btn-outline-secondary " data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-run-color btn btn-outline-primary mx-2" id="newsubmit" name="newsubmit" type="submit">Add Contact</button>
                    </div>
                </div>
              </form>
    </div>
</div>