<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("sertifikat_belakang/add");
$can_edit = ACL::is_allowed("sertifikat_belakang/edit");
$can_view = ACL::is_allowed("sertifikat_belakang/view");
$can_delete = ACL::is_allowed("sertifikat_belakang/delete");
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
                    <h4 class="record-title">View  Sertifikat Belakang</h4>
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
                                    <tr  class="td-nama_sertifikat">
                                        <th class="title"> Nama Sertifikat: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php 
                                                $dependent_field = (!empty($data['id_user']) ? urlencode($data['id_user']) : null);
                                                print_link('api/json/sertifikat_belakang_nama_sertifikat_option_list/'.$dependent_field); 
                                                ?>' 
                                                data-value="<?php echo $data['nama_sertifikat']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("sertifikat_belakang/editfield/" . urlencode($data['id'])); ?>" 
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
                                    <tr  class="td-materi1">
                                        <th class="title"> Materi1: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['materi1']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("sertifikat_belakang/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="materi1" 
                                                data-title="Enter Materi1" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['materi1']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-penguasaan1">
                                        <th class="title"> Penguasaan1: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['penguasaan1']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("sertifikat_belakang/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="penguasaan1" 
                                                data-title="Enter Penguasaan1" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['penguasaan1']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-praktek1">
                                        <th class="title"> Praktek1: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['praktek1']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("sertifikat_belakang/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="praktek1" 
                                                data-title="Enter Praktek1" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['praktek1']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-materi2">
                                        <th class="title"> Materi2: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['materi2']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("sertifikat_belakang/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="materi2" 
                                                data-title="Enter Materi2" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['materi2']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-penguasaan2">
                                        <th class="title"> Penguasaan2: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['penguasaan2']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("sertifikat_belakang/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="penguasaan2" 
                                                data-title="Enter Penguasaan2" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['penguasaan2']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-praktek2">
                                        <th class="title"> Praktek2: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['praktek2']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("sertifikat_belakang/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="praktek2" 
                                                data-title="Enter Praktek2" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['praktek2']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-materi3">
                                        <th class="title"> Materi3: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['materi3']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("sertifikat_belakang/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="materi3" 
                                                data-title="Enter Materi3" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['materi3']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-penguasaan3">
                                        <th class="title"> Penguasaan3: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['penguasaan3']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("sertifikat_belakang/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="penguasaan3" 
                                                data-title="Enter Penguasaan3" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['penguasaan3']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-praktek3">
                                        <th class="title"> Praktek3: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['praktek3']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("sertifikat_belakang/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="praktek3" 
                                                data-title="Enter Praktek3" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['praktek3']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-predikat">
                                        <th class="title"> Predikat: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['predikat']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("sertifikat_belakang/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="predikat" 
                                                data-title="Enter Predikat" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['predikat']; ?> 
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
                                    <a class="btn btn-sm btn-info"  href="<?php print_link("sertifikat_belakang/edit/$rec_id"); ?>">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                    <?php } ?>
                                    <?php if($can_delete){ ?>
                                    <a class="btn btn-sm btn-danger record-delete-btn mx-1"  href="<?php print_link("sertifikat_belakang/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
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
