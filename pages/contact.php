<?php
    ob_start();

    wp_enqueue_style('inbox');
    wp_enqueue_style('datatable');
    wp_enqueue_style('bootstrapcss');
    //admin menu page function
    wp_enqueue_script('datatable');
    wp_enqueue_script('custom');

   
    function contact()
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'contacts_table';
        $lidate = date('Y-m-d H:i:s');
        if (isset($_POST['newsubmit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $mobile = $_POST['mobile_no'];
            $description = $_POST['description'];
            $user_id = $_POST['user_id'];
            $lifecyclestage = $_POST['lifecyclestage'];
              
            
            if($user_id == ''){
                $wpdb->query("INSERT INTO $table_name(name,email,mobile_no,description,lifecyclestage,lifecyclestage_createdat,user_id) VALUES('$name','$email','$mobile','$description','$lifecyclestage','$lidate',NULL)");
            }else{
                $wpdb->query("INSERT INTO $table_name(name,email,mobile_no,description,lifecyclestage,lifecyclestage_createdat,user_id) VALUES('$name','$email','$mobile','$description','$lifecyclestage','$lidate','$user_id')");
            }
          
            
            echo "<script>location.replace('admin.php?page=contact');</script>";
        }

        if (isset($_GET['upt'])) {
            echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                var myModal = new bootstrap.Offcanvas(document.getElementById('updateModal'), {})
                myModal.toggle()
              });
               
            </script>";
        }

        if (isset($_POST['uptsubmit'])) {
            $user_id = '';
           
            // echo '<pre>';
            // echo $user_id;
            // echo '</pre>';
            // die;
            $lidate = date('Y-m-d H:i:s');
            $id = $_POST['uptid'];
            $name = $_POST['uptname'];
            $email = $_POST['uptemail'];
            $mobile = $_POST['uptmobile_no'];
            $description = $_POST['uptdescription'];
            $user_id = $_POST['user_id'];
            $lifecyclestage = $_POST['lifecyclestage'];

            $result = $wpdb->get_results("SELECT * FROM $table_name LEFT JOIN wp_users ON wp_users.id=$table_name.user_id WHERE $table_name.id=$id");

            //  echo '<pre>';
            // print_r($result[0]->lifecyclestage);
            // echo '</pre>';
            // die;

            if($result[0]->lifecyclestage !=  $lifecyclestage)
            {
                $wpdb->query("UPDATE $table_name SET lifecyclestage='$lifecyclestage',lifecyclestage_updatedat='$lidate' WHERE id='$id'");
            }

            if($_POST['user_id'] == '' ){
                $wpdb->query("UPDATE $table_name SET name='$name',user_id=NULL,email='$email',mobile_no='$mobile',description='$description' WHERE id='$id'");
            }else{
                
                $wpdb->query("UPDATE $table_name SET name='$name',user_id='$user_id',email='$email',mobile_no='$mobile',description='$description' WHERE id='$id'");
            }

            
            
            echo "<script>location.replace('admin.php?page=contact');</script>";
        }

        if (isset($_GET['view'])) {

            
            $table_name_users = $wpdb->prefix . 'users';
            $users1 = $wpdb->get_results("SELECT * FROM $table_name_users");
            $users = json_decode(json_encode($users1), true);

            $id = $_GET['view'];
            $is_read = 1;
            $wpdb->query("UPDATE $table_name SET is_read='$is_read' WHERE id='$id'");
            
            $result = $wpdb->get_results("SELECT * FROM $table_name WHERE id='$id'");
            foreach($result as $print) {
                $name = $print->name;
                $email = $print->email;
            }

            echo" <div class='right-sidebar mx-1'>
            <div class='offcanvas offcanvas-end' id='viewModal' tabindex='-1' aria-labelledby='viewModalLabel' >
                <div class='offcanvas-header d-flex justify-content-between'>
                    <h5 class='modal-title' id='updateModalLabel'>View Contact</h5>
                    <a href='admin.php?page=contact'>
                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </a>
                </div>
                <div class='offcanvas-body'>
                    <input type='hidden' id='uptid' name='uptid' value='$print->id'>
                    <div class='mb-3'>
                        <label for='name' class='form-label'>Name</label>
                        <input type='text' class='form-control' name='uptname' disabled value='$print->name' id='name' placeholder='Johan Doe'>
                    </div>
                    <div class='mb-3'>
                        <label for='email' class='form-label'>Email address</label>
                        <input type='email' class='form-control' name='uptemail' disabled value='$print->email' id='email' placeholder='name@example.com'>
                    </div>
                    <div class='mb-3'>
                        <label for='phone' class='form-label'>Mobile No</label>
                        <input type='tel' class='form-control' name='uptmobile_no' disabled value='$print->mobile_no' id='phone' placeholder='+1234567890'>
                    </div>
                  <div class='mb-3'>
                        <label for='text' class='form-label'>Description</label>
                        <textarea class='form-control' id='text' name='uptdescription' disabled rows='3'>$print->description</textarea>
                    </div>

                    <a href='admin.php?page=contact'><button type='button' class='btn btn-outline-secondary' data-bs-dismiss='modal'>Close</button></a>
                </div>   
              </div>
              </div>";

              echo "<script>
              document.addEventListener('DOMContentLoaded', function() {
                  var myModal = new bootstrap.Offcanvas(document.getElementById('viewModal'), {})
                  myModal.toggle()
                });
                 
              </script>";

            // echo "<script>location.replace('admin.php?page=contact');</script>";
        }

        if (isset($_GET['del'])) {
            $del_id = $_GET['del'];
            // $wpdb->query("DELETE FROM $table_name WHERE id='$del_id'");
            
            echo "  <div class='modal fade' id='deleteModal' tabindex='-1' role='dialog' aria-labelledby='deleteModalLabel' aria-hidden='true'>
                <div class='modal-dialog modal-dialog-centered' role='document'>
                    <div class='modal-content'>
                        <form action='' method='post' name='f1' onsubmit='return matchpass()'>
                            <div class='modal-header'>
                                <h5 class='modal-title' id='exampleModalLabel'>Trash Contact</h5>
                                <a href='admin.php?page=contact'>
                                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                </a>
                            </div>
                            <div class='modal-body'>
                                <p>Please type <b>$del_id</b> in input to trash this record</p>
                            
                                    <input type='hidden' id='trash_contact_id' name='trash_contact_id' value='$del_id'>

                                    <div class='mb-3'>
                                        <input type='number' class='form-control number-appireance-none' name='trash_contact_input' id='trash_contact_input' placeholder='Enter your id here'>
                                        <div class='text-danger text-left' id='error'></div>
                                    </div>
                            
                            </div>
                            <div class='modal-footer'>
                                <a href='admin.php?page=contact'><button type='button' class='btn btn-outline-secondary' data-bs-dismiss='modal'>Close</button></a>
                                <button type='submit' id='trashsubmit' name='trashsubmit' class='btn btn-run-color btn btn-outline-primary mx-2'>Trash Contact</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>";

            echo "<script>
              document.addEventListener('DOMContentLoaded', function() {
                  var myModal = new bootstrap.Modal(document.getElementById('deleteModal'), {})
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

          if (isset($_POST['trashsubmit'])) {
            $trash_contact_id = $_POST['trash_contact_id'];
            $trash_contact_input = $_POST['trash_contact_input'];

            if($trash_contact_id === $trash_contact_input){
                $wpdb->query("UPDATE $table_name SET trash_status=1 WHERE id='$trash_contact_id'");
            }
             echo "<script>location.replace('admin.php?page=contact');</script>";
          }
    
    ?>
        <div class="container-fluid">
            <div class="d-flex justify-content-between">
                <div>
                    <?php include(plugin_dir_path(__FILE__) . "../components/addnew-inbox.php"); ?>

                </div>
                <div class="d-flex">
                    <?php include(plugin_dir_path(__FILE__) . "../components/right-sidebar.php"); ?>
<!--                    --><?php //include(plugin_dir_path(__FILE__) . "../components/left-sidebar.php"); ?>
                </div>
            </div>
           
            <div class="mt-5">
            <div class="mb-3 dataTables_filter1 d-flex justify-content-between">
                <div class="">
                    <input type="text" id="searchbox" placeholder="Search here">
                    <button class="btn btn-run-color mr-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="fa-light fa-filter"></i></button>
                </div>
              
                <a class="btn btn-danger mr-2" href="admin.php?page=trash">Trash List</a>
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
          

          $result1 = $wpdb->get_results("SELECT * FROM $table_name  LEFT JOIN wp_users  ON wp_users.id=$table_name.user_id  WHERE $table_name.trash_status=0");
          $array = json_decode(json_encode($result1), true);

        //    echo '<pre>';
        //     print_r($array);
        //     echo '</pre>';
        //     die;
            if (isset($_GET['unread']) && $_GET['unread'] == 'on' || isset($_GET['unassigned']) && $_GET['unassigned'] == 'on' ||  isset($_GET['unchanged']) && $_GET['unchanged'] == 'on') { 
              
                $result1 = array();

                if(isset($_GET['unread'])){
                    foreach($array as $filter){
                        if($filter['is_read'] == '0'){
                           array_push($result1,$filter);
                        }
                    }  
                }else{
                    foreach($array as $filter){
                        array_push($result1,$filter);
                    }  
                }

               
                $result2 = array();

                if(isset($_GET['unassigned'])){
                    foreach($result1 as $filter1){
                        if($filter1['user_id'] == NULL){
                           array_push($result2,$filter1);
                        }
                    }
                }else{
                    foreach($result1 as $filter1){
                        array_push($result2,$filter1);
                    }  
                }

                $result = array();

                if(isset($_GET['unchanged'])){
                    foreach($result2 as $filter2){
                        if($filter2['creation_date'] == $filter2['updation_date']){
                           array_push($result,$filter2);
                        }
                    }
                }else{
                    foreach($result2 as $filter2){
                        array_push($result,$filter1);
                    }  
                }

                 
            }else{
                // $array1 = $wpdb->get_results("SELECT * FROM $table_name");
                $array3 = $wpdb->get_results("SELECT * FROM $table_name LEFT JOIN wp_users ON wp_users.id=$table_name.user_id WHERE $table_name.trash_status=0");
                // $sql = $wpdb->get_results("SELECT $table_name.*, wp_users.* FROM $table_name, wp_users WHERE $table_name.user_id=wp_users.id");
                // echo '<pre>';
                // print_r($array3);
                // echo '</pre>';
                // die;
                $result = json_decode(json_encode($array3), true);
            }
              
            foreach ($result as $print) {
                echo "
                    <tr>
                        <td></td>
                        <td width='5%'>".$print['id']."</td>
                        <td width='25%'><div class='' data-id=".$print['id']."><a href='#' class='myajax'>".$print['name']."</a></td>
                        <td width='25%'>".$print['email']."</td>
                        <td width='25%'>".$print['mobile_no']."</td>
                        <td width='25%'>".$print['description']."</td>
                        <td width='25%'>".(($print['display_name'] == '') ? 'Unassigned' : $print['display_name'])."</td>
                        <td><span class='badge ".(($print['is_read'] == '1') ? 'text-bg-success' : 'text-bg-warning')."'>".(($print['is_read'] == '1') ? 'readed' : 'Unreaded')."</span></td>
                        <td width='25%'>
                            <a href='admin.php?page=contact&upt=".$print['id']."'><button class='btn btn-sm btn-run-color' type='button'><i class='fa-light fa-pen-to-square'></i></button></a>
                            <a href='admin.php?page=contact&del=".$print['id']."'><button class='btn btn-sm btn-outline-danger' type='button'><i class='fa-regular fa-trash'></i></button></a> 
                        </td>
                    </tr>
                    ";
                }
                ?>
            </tbody>
        </table>

        <div id="view-contaqctdata"></div>
        <?php
            if (isset($_GET['upt'])) {
                $upt_id = $_GET['upt'];
                $result = $wpdb->get_results("SELECT * FROM $table_name LEFT JOIN wp_users ON wp_users.id=$table_name.user_id WHERE $table_name.id=$upt_id");
                //  echo '<pre>';
                // print_r($result);
                // echo '</pre>';
                // die;
                // $result = $wpdb->get_results("SELECT * FROM $table_name WHERE id='$upt_id'");
                foreach($result as $print) {
                    $name = $print->name;
                    $email = $print->email;
                }
                echo" <div class='right-sidebar mx-1'>
            <div class='offcanvas offcanvas-end' id='updateModal' tabindex='-1' aria-labelledby='updateModalLabel' >
                <div class='offcanvas-header d-flex justify-content-between'>
                    <h5 class='modal-title' id='updateModalLabel'>View Contact</h5>
                    <a href='admin.php?page=contact'>
                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </a>
                </div>

                <div class='offcanvas-body'>
                <form action='' method='post'>
                    <input type='hidden' id='uptid' name='uptid' value='$print->id'>
                        <div class='mb-3'>
                            <label for='name' class='form-label'>Name</label>
                            <input type='text' class='form-control' name='uptname' value='$print->name' id='name' placeholder='Johan Doe'>
                        </div>
                    <div class='mb-3'>
                        <label for='email' class='form-label'>Email address</label>
                        <input type='email' class='form-control' name='uptemail' value='$print->email' id='email' placeholder='name@example.com'>
                    </div>
                    <div class='mb-3'>
                        <label for='phone' class='form-label'>Mobile No</label>
                        <input type='tel' class='form-control' name='uptmobile_no' value='$print->mobile_no' id='phone' placeholder='+1234567890'>
                    </div>
                    <div class='mb-3'>
                    <label for='phone' class='form-label'>Assigned to</label>
                    <select class='form-select' name='user_id' aria-label='Assigned to'>
                    <option selected value=''>Select Assigned to</option>";
                    foreach($users as $users2)
                    {   
                        echo"<option ".(($print->user_id == $users2['ID']) ? 'selected' : '')." value=".$users2['ID'].">".$users2['display_name']."</option>";
                    }
                  
                    echo " </select>
                    </div> 

                    <div class='mb-3'>
                    <label for='phone' class='form-label'>Lifecycle stage</label>
                    <select class='form-select' name='lifecyclestage' aria-label='Lifecycle stage'>
                    <option value='lead'".(($print->lifecyclestage == 'lead') ? 'selected' : '').">Lead</option>
                    <option value='opportunities'".(($print->lifecyclestage == 'opportunities') ? 'selected' : '').">opportunities</option>
                    </select>
                    </div> 
                    <div class='mb-3'>
                        <label for='text' class='form-label'>Description</label>
                        <textarea class='form-control' id='text' name='uptdescription' rows='3'>$print->description</textarea>
                    </div>
                    <a href='admin.php?page=contact'><button type='button' class='btn btn-outline-secondary' data-bs-dismiss='modal'>Close</button></a>
                    <button id='uptsubmit' name='uptsubmit' type='submit' class='btn btn-run-color btn btn-outline-primary mx-2'>Save changes</button>
                </div>
                </form>   
              </div>
              </div>";
            }
        ?>

      

    <?php
    }

add_action('admin_head', 'my_action_javascript');

function my_action_javascript() {
?>
<script type="text/javascript" >
jQuery(document).ready(function($) {

    $('.myajax').click(function(){
        var contact_id = $(this).parent().data('id');
        var data = {
            action: 'my_action',
            id: contact_id,
        };

        // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
        $.post(ajaxurl, data, function(response) {
            $('#view-contaqctdata').html(response);
            let myModal = new bootstrap.Offcanvas(document.getElementById('viewModal'), {})
            myModal.toggle()
        });
    });


});
</script>
<?php
}

add_action('wp_ajax_my_action', 'my_action_callback');

function my_action_callback() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'contacts_table';
    $table_name_users = $wpdb->prefix . 'users';
    $users1 = $wpdb->get_results("SELECT * FROM $table_name_users");
    $users = json_decode(json_encode($users1), true);

    $id = $_POST['id'];
    $is_read = 1;
    $wpdb->query("UPDATE $table_name SET is_read='$is_read' WHERE id='$id'");
    
    $result = $wpdb->get_results("SELECT * FROM $table_name WHERE id='$id'");
    foreach($result as $print) {
        $name = $print->name;
        $email = $print->email;
    }

    echo" <div class='right-sidebar mx-1'>
    <div class='offcanvas offcanvas-end' id='viewModal' tabindex='-1' aria-labelledby='viewModalLabel' >
        <div class='offcanvas-header d-flex justify-content-between'>
            <h5 class='modal-title' id='updateModalLabel'>View Contact</h5>
            <a href='admin.php?page=contact'>
            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
            </a>
        </div>
        <div class='offcanvas-body'>
            <input type='hidden' id='uptid' name='uptid' value='$print->id'>
            <div class='mb-3'>
                <label for='name' class='form-label'>Name</label>
                <input type='text' class='form-control' name='uptname' disabled value='$print->name' id='name' placeholder='Johan Doe'>
            </div>
            <div class='mb-3'>
                <label for='email' class='form-label'>Email address</label>
                <input type='email' class='form-control' name='uptemail' disabled value='$print->email' id='email' placeholder='name@example.com'>
            </div>
            <div class='mb-3'>
                <label for='phone' class='form-label'>Mobile No</label>
                <input type='tel' class='form-control' name='uptmobile_no' disabled value='$print->mobile_no' id='phone' placeholder='+1234567890'>
            </div>
          <div class='mb-3'>
                <label for='text' class='form-label'>Description</label>
                <textarea class='form-control' id='text' name='uptdescription' disabled rows='3'>$print->description</textarea>
            </div>

            <a href='admin.php?page=contact'><button type='button' class='btn btn-outline-secondary' data-bs-dismiss='modal'>Close</button></a>
        </div>   
      </div>
      </div>
      ";

     
     exit(); // this is required to return a proper result & exit is faster than die();
}
?>

