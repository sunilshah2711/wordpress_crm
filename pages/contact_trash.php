<?php 
   function contact_trash() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'contacts_table';
        ?>
         <div class="container-fluid">
            <div class="mt-5">
            <div class="d-flex align-items-center mb-3  justify-content-between">
                <h4 class="mt-2 mb-0 p-0 me-3 text-danger">Trashed Contacts</h4>
                <a href="admin.php?page=contact"><button class="btn btn-sm btn-run-color" type="button"><i class="fa-light fa-arrow-left"></i><span class="ml-2">Back</span></button></a>
            </div>
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
                                        <div class='modal-body'>
                                            <p>Please type <b>$del_id</b> in input to trash this record</p>
                                        
                                                <input type='hidden' id='trash_contact_id' name='del_contact_id' value='$del_id'>
            
                                                <div class='mb-3'>
                                                    <input type='number' class='form-control' name='del_contact_input' id='trash_contact_input' placeholder='Enter your id here'>
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
                                        alert('Id dose note match!');
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
                        echo "<script>location.replace('admin.php?page=contact_trash');</script>";
                    }

                    if (isset($_GET['conrestore'])) {
                        // echo "soihfiurwhgvkhvbvskhjlbiljkgbiglhwrhkfgbngklbwrkgf";
                        $res_id = $_GET['conrestore'];
                        $wpdb->query("UPDATE $table_name SET trash_status=0 WHERE id='$res_id'");
                        echo "<script>location.replace('admin.php?page=contact_trash');</script>";
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
                                        <a href='admin.php?page=contact_trash&condel=".$print['id']."'><button class='btn btn-sm btn-outline-danger' type='button'><i class='fa-regular fa-trash'></i></button></a>
                                        <a href='admin.php?page=contact_trash&conrestore=".$print['id']."'><button class='btn btn-sm btn-outline-success' type='button'><i class='fa-light fa-arrows-rotate'></i></button></a>
                                    </td>
                                </tr>
                                ";
                            }
                            ?>
                        </tbody>
                    </table>
                    </div> 
            </div>
            <?php
   }
?>