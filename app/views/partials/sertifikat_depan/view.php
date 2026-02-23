<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("sertifikat_depan/add");
$can_edit = ACL::is_allowed("sertifikat_depan/edit");
$can_view = ACL::is_allowed("sertifikat_depan/view");
$can_delete = ACL::is_allowed("sertifikat_depan/delete");
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
                    <h4 class="record-title">View  Sertifikat Depan</h4>
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
                    <div  class="card animated fadeIn page-content">
                        <?php
                        $counter = 0;
                        if(!empty($data)){
                        $rec_id = (!empty($data['id']) ? urlencode($data['id']) : null);
                        $counter++;
                        ?>
                        <div id="page-report-body" class="">
                            <table class="table table-hover table-borderless table-striped">
                                <!-- Table Body Start -->
                                <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                    <tr  class="td-no_disnaker">
                                        <th class="title"> No Disnaker: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['no_disnaker']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("sertifikat_depan/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="no_disnaker" 
                                                data-title="Enter No Disnaker" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['no_disnaker']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-nama_sertifikat">
                                        <th class="title"> Nama Sertifikat: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php 
                                                $dependent_field = (!empty($data['id_user']) ? urlencode($data['id_user']) : null);
                                                print_link('api/json/sertifikat_depan_nama_sertifikat_option_list/'.$dependent_field); 
                                                ?>' 
                                                data-value="<?php echo $data['nama_sertifikat']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("sertifikat_depan/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="nama_sertifikat" 
                                                data-title="Select a value ..." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="select" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['nama_sertifikat']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-tgl_sertifikat">
                                        <th class="title"> Tgl Sertifikat: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-flatpickr="{ enableTime: false, minDate: '', maxDate: ''}" 
                                                data-value="<?php echo $data['tgl_sertifikat']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("sertifikat_depan/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="tgl_sertifikat" 
                                                data-title="Enter Tgl Sertifikat" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="flatdatetimepicker" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['tgl_sertifikat']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-materi_sertifikat">
                                        <th class="title"> Materi Sertifikat: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['materi_sertifikat']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("sertifikat_depan/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="materi_sertifikat" 
                                                data-title="Enter Materi Sertifikat" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['materi_sertifikat']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                                <!-- Table Body End -->
                            </table>
                        </div>
                        <div class="p-3 d-flex">
                            <div class="dropup export-btn-holder mx-1">
                                <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-save"></i> LIHAT SERTIFIKAT
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <?php $export_print_link = $this->set_current_page_link(array('format' => 'print')); ?>
                                    <a class="dropdown-item export-link-btn" data-format="print" href="<?php print_link($export_print_link); ?>" target="_blank">
                                        <img src="<?php print_link('assets/images/print.png') ?>" class="mr-2" /> PRINT
                                        </a>
                                        <?php $export_pdf_link = $this->set_current_page_link(array('format' => 'pdf')); ?>
                                        <a class="dropdown-item export-link-btn" data-format="pdf" href="<?php print_link($export_pdf_link); ?>" target="_blank">
                                            <img src="<?php print_link('assets/images/pdf.png') ?>" class="mr-2" /> PDF
                                            </a>
                                        </div>
                                    </div>
                                    <?php if($can_edit){ ?>
                                    <a class="btn btn-sm btn-info"  href="<?php print_link("sertifikat_depan/edit/$rec_id"); ?>">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                    <?php } ?>
                                    <?php if($can_delete){ ?>
                                    <a class="btn btn-sm btn-danger record-delete-btn mx-1"  href="<?php print_link("sertifikat_depan/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
                                        <i class="fa fa-times"></i> Delete
                                    </a>
                                    <?php } ?>
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
