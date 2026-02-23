<?php
$comp_model = new SharedController;
$page_element_id = "add-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$show_header = $this->show_header;
$view_title = $this->view_title;
$redirect_to = $this->redirect_to;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="add"  data-display-type="" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">Add New User</h4>
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
                <div class="col-md-7 comp-grid">
                    <?php $this :: display_page_errors(); ?>
                    <div  class="bg-light p-3 animated fadeIn page-content">
                        <form id="user-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="<?php print_link("user/add?csrf_token=$csrf_token") ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="username">Nama Lengkap <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input id="ctrl-username"  value="<?php  echo $this->set_field_value('username',""); ?>" type="text" placeholder="Enter Nama Lengkap"  required="" name="username"  data-url="api/json/user_username_value_exist/" data-loading-msg="Checking availability ..." data-available-msg="Available" data-unavailable-msg="Not available" class="form-control  ctrl-check-duplicate" />
                                                    <div class="check-status"></div> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="password">Password </label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <input id="ctrl-password"  value="<?php  echo $this->set_field_value('password',""); ?>" type="password" placeholder="Enter Password" maxlength="255"  name="password"  class="form-control  password" />
                                                        <div class="input-group-append cursor-pointer btn-toggle-password">
                                                            <span class="input-group-text"><i class="fa fa-eye"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label class="control-label" for="confirm_password">Confirm Password </label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="input-group">
                                                        <input id="ctrl-password-confirm" data-match="#ctrl-password"  class="form-control password-confirm " type="password" name="confirm_password"  placeholder="Confirm Password" />
                                                        <div class="input-group-append cursor-pointer btn-toggle-password">
                                                            <span class="input-group-text"><i class="fa fa-eye"></i></span>
                                                        </div>
                                                        <div class="invalid-feedback">
                                                            Password does not match
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label class="control-label" for="email">Email </label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="">
                                                        <input id="ctrl-email"  value="<?php  echo $this->set_field_value('email',""); ?>" type="email" placeholder="Enter Email"  name="email"  data-url="api/json/user_email_value_exist/" data-loading-msg="Checking availability ..." data-available-msg="Available" data-unavailable-msg="Not available" class="form-control  ctrl-check-duplicate" />
                                                            <div class="check-status"></div> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label class="control-label" for="photo">Photo </label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="">
                                                            <div class="dropzone " input="#ctrl-photo" fieldname="photo"    data-multiple="false" dropmsg="Pas Foto dengan baju formal (Background warna bebas)"    btntext="Browse" extensions=".jpg,.png,.jpeg" filesize="10" maximum="1">
                                                                <input name="photo" id="ctrl-photo" class="dropzone-input form-control" value="<?php  echo $this->set_field_value('photo',""); ?>" type="text"  />
                                                                    <!--<div class="invalid-feedback animated bounceIn text-center">Please a choose file</div>-->
                                                                    <div class="dz-file-limit animated bounceIn text-center text-danger"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label class="control-label" for="tgl_lahir">Tgl Lahir </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="input-group">
                                                                <input id="ctrl-tgl_lahir" class="form-control datepicker  datepicker"  value="<?php  echo $this->set_field_value('tgl_lahir',""); ?>" type="datetime" name="tgl_lahir" placeholder="Enter Tgl Lahir" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="F j, Y" data-inline="false" data-no-calendar="false" data-mode="single" />
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <label class="control-label" for="no_hp">No Hp </label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="">
                                                                    <input id="ctrl-no_hp"  value="<?php  echo $this->set_field_value('no_hp',""); ?>" type="text" placeholder="Enter No Hp"  name="no_hp"  class="form-control " />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <label class="control-label" for="instansi">Instansi </label>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <div class="">
                                                                        <input id="ctrl-instansi"  value="<?php  echo $this->set_field_value('instansi',""); ?>" type="text" placeholder="Enter Instansi"  name="instansi"  class="form-control " />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <div class="row">
                                                                    <div class="col-sm-4">
                                                                        <label class="control-label" for="alamat">Alamat </label>
                                                                    </div>
                                                                    <div class="col-sm-8">
                                                                        <div class="">
                                                                            <textarea placeholder="Enter Alamat" id="ctrl-alamat"  rows="5" name="alamat" class=" form-control"><?php  echo $this->set_field_value('alamat',""); ?></textarea>
                                                                            <!--<div class="invalid-feedback animated bounceIn text-center">Please enter text</div>-->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <div class="row">
                                                                    <div class="col-sm-4">
                                                                        <label class="control-label" for="materi">Materi </label>
                                                                    </div>
                                                                    <div class="col-sm-8">
                                                                        <div class="">
                                                                            <input id="ctrl-materi"  value="<?php  echo $this->set_field_value('materi',""); ?>" type="text" placeholder="Enter Materi" disabled  name="materi"  class="form-control " />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group form-submit-btn-holder text-center mt-3">
                                                                <div class="form-ajax-status"></div>
                                                                <button class="btn btn-primary" type="submit">
                                                                    Submit
                                                                    <i class="fa fa-send"></i>
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
