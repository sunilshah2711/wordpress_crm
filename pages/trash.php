<?php
    ob_start();
    //admin menu page function
    function trash()
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'contacts_table';
    ?>
         <style>
            body
            {
                background-color:#f1f1f2;
            }
        </style>

        <!-- Single Item -->
        <div class="tile mt-4" id="tile-1">
            <ul class="nav nav-tabs container" id="myTab" role="tablist">
                <div class="slider"></div>
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true"><i class="fa-light fa-address-book"></i> Contacts</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link " id="inbox-tab" data-bs-toggle="tab" data-bs-target="#inbox-tab-pane" type="button" role="tab" aria-controls="inbox-tab-pane" aria-selected="true"><i class="fa-light fa-address-book"></i> Inbox</a>
                </li>
                <!-- <li class="nav-item" role="presentation">
                    <a class="nav-link " id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true"><i class="fa-light fa-address-book"></i> Contacts</a>
                </li> -->
            </ul>
            <div class="tab-content" id="myTabContent">

                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                    <div class="we-offer-area text-center">
                        <div class="container">
                        <div class="mb-3 dataTables_filter1 d-flex justify-content-between">
                            <div class="">
                                <input type="text" id="searchbox" placeholder="Search here">
                                <!-- <button class="btn btn-run-color mr-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="fa-light fa-filter"></i></button> -->
                            </div>
                        
                            <!-- <a class="btn btn-danger mr-2" href="admin.php?page=contact_trash">Trash List</a> -->
                        </div>
                        <table id="example" class="wp-list-table widefat fixed striped crm-table" width="100%">
                                <thead>
                                    <tr class="manage-column column-cb check-column">
                                        <th style="width:2%"><input type="checkbox" name="select_all" value="1" id="example-select-all"></th>
                                        <th style="width:2%">id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile No</th>
                                        <th>Description</th>
                                        <th>Assigned to</th>
                                        <th>Is Read</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            
                                <tbody>
                                <?php


                                    // $array1 = $wpdb->get_results("SELECT * FROM $table_name");
                                    $array3 = $wpdb->get_results("SELECT * FROM $table_name LEFT JOIN wp_users ON wp_users.id=$table_name.user_id WHERE $table_name.trash_status=1");
                                    // $sql = $wpdb->get_results("SELECT $table_name.*, wp_users.* FROM $table_name, wp_users WHERE $table_name.user_id=wp_users.id");
                                    // echo '<pre>';
                                    // print_r($array3);
                                    // echo '</pre>';
                                    // die;
                                    $result = json_decode(json_encode($array3), true);

                                    if (isset($_GET['condel'])) {
                                        $del_id = $_GET['condel'];
                                        // $wpdb->query("DELETE FROM $table_name WHERE id='$del_id'");
                                        
                                        echo "  <div class='modal fade' id='condeleteModal' tabindex='-1' role='dialog' aria-labelledby='condeleteModalLabel' aria-hidden='true'>
                                            <div class='modal-dialog' role='document'>
                                                <div class='modal-content'>
                                                    <form action='' method='post' name='f1' onsubmit='return matchpass()'>
                                                        <div class='modal-header'>
                                                            <h5 class='modal-title' id='exampleModalLabel'>Delete Contact</h5>
                                                            <a href='admin.php?page=contact'>
                                                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                                            </a>
                                                        </div>
                                                        <div class='modal-body text-start'>
                                                            <p>Please type <b>$del_id</b> in input to trash this record</p>
                                                        
                                                                <input type='hidden' id='trash_contact_id' name='del_contact_id' value='$del_id'>
                            
                                                                <div class='mb-3 text-left'>
                                                                    <input type='number' class='form-control number-appireance-none' name='del_contact_input' id='trash_contact_input' placeholder='Enter your id here'>
                                                                    <div class='text-danger text-left' id='error'></div>
                                                                </div>
                                                        
                                                        </div>
                                                        <div class='modal-footer'>
                                                            <a href='admin.php?page=contact'><button type='button' class='btn btn-outline-secondary' data-bs-dismiss='modal'>Close</button></a>
                                                            <button type='submit' id='condelsubmit' name='condelsubmit' class='btn btn-run-color btn btn-outline-primary mx-2'>Delete Contact</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>";
                            
                                        echo "<script>
                                        document.addEventListener('DOMContentLoaded', function() {
                                            var myModal = new bootstrap.Modal(document.getElementById('condeleteModal'), {})
                                            myModal.toggle()
                                            });
                                        
                                            function matchpass(){
                                                var firstpassword=document.f1.trash_contact_id.value;
                                                var secondpassword=document.f1.trash_contact_input.value;
                                                
                                                    if(firstpassword==secondpassword){
                                                        return true;
                                                    }
                                                    else{
                                                        var element = document.getElementById('trash_contact_input');
                                                        element.classList.add('is-invalid');
                                                        document.getElementById('error').innerHTML='Id dose note match!';
                                                        return false;
                                                    }
                                            }
                                        </script>";
                                    }

                                    
                                    if (isset($_POST['condelsubmit'])) {
                                        // echo"called";
                                        // die;
                                        $trash_contact_id = $_POST['del_contact_id'];
                                        $trash_contact_input = $_POST['del_contact_input'];

                                        if($trash_contact_id === $trash_contact_input){
                                            $wpdb->query("DELETE FROM $table_name WHERE id='$del_id'");
                                        }
                                        echo "<script>location.replace('admin.php?page=trash');</script>";
                                    }

                                    if (isset($_GET['conrestore'])) {
                                        // echo "soihfiurwhgvkhvbvskhjlbiljkgbiglhwrhkfgbngklbwrkgf";
                                        $res_id = $_GET['conrestore'];
                                        $wpdb->query("UPDATE $table_name SET trash_status=0 WHERE id='$res_id'");
                                        echo "<script>location.replace('admin.php?page=trash');</script>";
                                    }
                                        foreach ($result as $print) {
                                            echo "
                                                <tr>
                                                    <td><input type='checkbox' name='contactid[]' value='".$print['id']."'></td>
                                                    <td width='5%'>".$print['id']."</td>
                                                    <td width='25%'>".$print['name']."</td>
                                                    <td width='25%'>".$print['email']."</td>
                                                    <td width='25%'>".$print['mobile_no']."</td>
                                                    <td width='25%'>".$print['description']."</td>
                                                    <td width='25%'>".(($print['display_name'] == '') ? 'Unassigned' : $print['display_name'])."</td>
                                                    <td><span class='badge ".(($print['is_read'] == '1') ? 'text-bg-success' : 'text-bg-warning')."'>".(($print['is_read'] == '1') ? 'readed' : 'Unreaded')."</span></td>
                                                    <td width='25%'>
                                                        <a href='admin.php?page=trash&condel=".$print['id']."'><button class='btn btn-sm btn-outline-danger' type='button'><i class='fa-regular fa-trash'></i></button></a>
                                                        <a href='admin.php?page=trash&conrestore=".$print['id']."'><button class='btn btn-sm btn-outline-success' type='button'><i class='fa-light fa-arrows-rotate'></i></button></a>
                                                    </td>
                                                </tr>
                                                ";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div> 
                        </div>  
                    </div>

                <div class="tab-pane fade show" id="inbox-pane-pane" role="tabpanel" aria-labelledby="inbox-tab" tabindex="0">
                    <div class="we-offer-area text-center">
                        <div class="container">
                            <p>this is inbox tab</p>
                        </div>  
                    </div>
                </div>

            </div>
            </div>  
        </section>
    <?php
    }
?>