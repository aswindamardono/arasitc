<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("user/add");
$can_edit = ACL::is_allowed("user/edit");
$can_view = ACL::is_allowed("user/view");
$can_delete = ACL::is_allowed("user/delete");
?>
<?php
$comp_model = new SharedController;
$page_element_id = "view-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
//Page Data Information from Controller
$data = $this->view_data;
//$rec_id = $data['__tableprimarykey'];
$page_id = $this->route->page_id; //Page id from url
$view_title = $this->view_title;
$show_header = $this->show_header;
$show_edit_btn = $this->show_edit_btn;
$show_delete_btn = $this->show_delete_btn;
$show_export_btn = $this->show_export_btn;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="view"  data-display-type="table" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">My Account</h4>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    <div  class="">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 comp-grid">
                    <?php $this :: display_page_errors(); ?>
                    <div  class="card animated zoomInUp page-content">
                        <?php
                        $counter = 0;
                        if(!empty($data)){
                        $rec_id = (!empty($data['id']) ? urlencode($data['id']) : null);
                        $counter++;
                        ?>
                        <div class="bg-primary m-2 mb-4">
                            <div class="profile">
                                <div class="avatar">
                                    <?php 
                                    if(!empty(USER_PHOTO)){
                                    Html::page_img(USER_PHOTO, 100, 100); 
                                    }
                                    ?>
                                </div>
                                <h1 class="title mt-4"><?php echo $data['username']; ?></h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="mx-3 mb-3">
                                    <ul class="nav nav-pills flex-column text-left">
                                        <li class="nav-item">
                                            <a data-toggle="tab" href="#AccountPageView" class="nav-link active">
                                                <i class="fa fa-user"></i> Account Detail
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a data-toggle="tab" href="#AccountPageEdit" class="nav-link">
                                                <i class="fa fa-edit"></i> Edit Account
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a data-toggle="tab" href="#AccountPageChangeEmail" class="nav-link">
                                                <i class="fa fa-envelope"></i> Change Email
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a data-toggle="tab" href="#AccountPageChangePassword" class="nav-link">
                                                <i class="fa fa-key"></i> Reset Password
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-9">
                                <div class="mb-3">
                                    <div class="tab-content">
                                        <div class="tab-pane show active fade" id="AccountPageView" role="tabpanel">
                                            <table class="table table-hover table-borderless table-striped">
                                                <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                                    <tr  class="td-username">
                                                        <th class="title"> Username: </th>
                                                        <td class="value">
                                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['username']; ?>" 
                                                                data-pk="<?php echo $data['id'] ?>" 
                                                                data-url="<?php print_link("user/editfield/" . urlencode($data['id'])); ?>" 
                                                                data-name="username" 
                                                                data-title="Enter Nama Lengkap" 
                                                                data-placement="left" 
                                                                data-toggle="click" 
                                                                data-type="text" 
                                                                data-mode="popover" 
                                                                data-showbuttons="left" 
                                                                class="is-editable" <?php } ?>>
                                                                <?php echo $data['username']; ?> 
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr  class="td-email">
                                                        <th class="title"> Email: </th>
                                                        <td class="value">
                                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['email']; ?>" 
                                                                data-pk="<?php echo $data['id'] ?>" 
                                                                data-url="<?php print_link("user/editfield/" . urlencode($data['id'])); ?>" 
                                                                data-name="email" 
                                                                data-title="Enter Email" 
                                                                data-placement="left" 
                                                                data-toggle="click" 
                                                                data-type="email" 
                                                                data-mode="popover" 
                                                                data-showbuttons="left" 
                                                                class="is-editable" <?php } ?>>
                                                                <?php echo $data['email']; ?> 
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr  class="td-photo">
                                                        <th class="title"> Photo: </th>
                                                        <td class="value"><?php Html :: page_img($data['photo'],400,400,1); ?></td>
                                                    </tr>
                                                    <tr  class="td-account_status">
                                                        <th class="title"> Account Status: </th>
                                                        <td class="value">
                                                            <span <?php if($can_edit){ ?> data-source='<?php echo json_encode_quote(Menu :: $account_status); ?>' 
                                                                data-value="<?php echo $data['account_status']; ?>" 
                                                                data-pk="<?php echo $data['id'] ?>" 
                                                                data-url="<?php print_link("user/editfield/" . urlencode($data['id'])); ?>" 
                                                                data-name="account_status" 
                                                                data-title="Select a value ..." 
                                                                data-placement="left" 
                                                                data-toggle="click" 
                                                                data-type="select" 
                                                                data-mode="popover" 
                                                                data-showbuttons="left" 
                                                                class="is-editable" <?php } ?>>
                                                                <?php echo $data['account_status']; ?> 
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr  class="td-tgl_lahir">
                                                        <th class="title"> Tgl Lahir: </th>
                                                        <td class="value">
                                                            <span <?php if($can_edit){ ?> data-flatpickr="{ enableTime: false, minDate: '', maxDate: ''}" 
                                                                data-value="<?php echo $data['tgl_lahir']; ?>" 
                                                                data-pk="<?php echo $data['id'] ?>" 
                                                                data-url="<?php print_link("user/editfield/" . urlencode($data['id'])); ?>" 
                                                                data-name="tgl_lahir" 
                                                                data-title="Enter Tgl Lahir" 
                                                                data-placement="left" 
                                                                data-toggle="click" 
                                                                data-type="flatdatetimepicker" 
                                                                data-mode="popover" 
                                                                data-showbuttons="left" 
                                                                class="is-editable" <?php } ?>>
                                                                <?php echo $data['tgl_lahir']; ?> 
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr  class="td-no_hp">
                                                        <th class="title"> No Hp: </th>
                                                        <td class="value">
                                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['no_hp']; ?>" 
                                                                data-pk="<?php echo $data['id'] ?>" 
                                                                data-url="<?php print_link("user/editfield/" . urlencode($data['id'])); ?>" 
                                                                data-name="no_hp" 
                                                                data-title="Enter No Hp" 
                                                                data-placement="left" 
                                                                data-toggle="click" 
                                                                data-type="text" 
                                                                data-mode="popover" 
                                                                data-showbuttons="left" 
                                                                class="is-editable" <?php } ?>>
                                                                <?php echo $data['no_hp']; ?> 
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr  class="td-instansi">
                                                        <th class="title"> Instansi: </th>
                                                        <td class="value">
                                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['instansi']; ?>" 
                                                                data-pk="<?php echo $data['id'] ?>" 
                                                                data-url="<?php print_link("user/editfield/" . urlencode($data['id'])); ?>" 
                                                                data-name="instansi" 
                                                                data-title="Enter Instansi" 
                                                                data-placement="left" 
                                                                data-toggle="click" 
                                                                data-type="text" 
                                                                data-mode="popover" 
                                                                data-showbuttons="left" 
                                                                class="is-editable" <?php } ?>>
                                                                <?php echo $data['instansi']; ?> 
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr  class="td-alamat">
                                                        <th class="title"> Alamat: </th>
                                                        <td class="value">
                                                            <span <?php if($can_edit){ ?> data-pk="<?php echo $data['id'] ?>" 
                                                                data-url="<?php print_link("user/editfield/" . urlencode($data['id'])); ?>" 
                                                                data-name="alamat" 
                                                                data-title="Enter Alamat" 
                                                                data-placement="left" 
                                                                data-toggle="click" 
                                                                data-type="textarea" 
                                                                data-mode="popover" 
                                                                data-showbuttons="left" 
                                                                class="is-editable" <?php } ?>>
                                                                <?php echo $data['alamat']; ?> 
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr  class="td-materi">
                                                        <th class="title"> Materi: </th>
                                                        <td class="value">
                                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['materi']; ?>" 
                                                                data-pk="<?php echo $data['id'] ?>" 
                                                                data-url="<?php print_link("user/editfield/" . urlencode($data['id'])); ?>" 
                                                                data-name="materi" 
                                                                data-title="Enter Materi" 
                                                                data-placement="left" 
                                                                data-toggle="click" 
                                                                data-type="text" 
                                                                data-mode="popover" 
                                                                data-showbuttons="left" 
                                                                class="is-editable" <?php } ?>>
                                                                <?php echo $data['materi']; ?> 
                                                            </span>
                                                        </td>
                                                    </tr>
                                                </tbody>    
                                            </table>
                                        </div>
                                        <div class="tab-pane fade" id="AccountPageEdit" role="tabpanel">
                                            <div class=" reset-grids">
                                                <?php  $this->render_page("account/edit"); ?>
                                            </div>
                                        </div>
                                        <div class="tab-pane  fade" id="AccountPageChangeEmail" role="tabpanel">
                                            <div class=" reset-grids">
                                                <?php  $this->render_page("account/change_email"); ?>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="AccountPageChangePassword" role="tabpanel">
                                            <div class=" reset-grids">
                                                <?php  $this->render_page("passwordmanager"); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        else{
                        ?>
                        <!-- Empty Record Message -->
                        <div class="text-muted p-3">
                            <i class="fa fa-ban"></i> No Record Found
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
