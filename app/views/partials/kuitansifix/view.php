<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("kuitansifix/add");
$can_edit = ACL::is_allowed("kuitansifix/edit");
$can_view = ACL::is_allowed("kuitansifix/view");
$can_delete = ACL::is_allowed("kuitansifix/delete");
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
                    <h4 class="record-title">View  Kuitansi</h4>
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
                                    <tr  class="td-no_kuitansi">
                                        <th class="title"> No Kuitansi: </th>
                                        <td class="value">
                                            <a size="sm" class="btn btn-sm btn-primary page-modal" href="<?php print_link("absensi/list/username_absensi/" . urlencode($data['username_absensi'])) ?>">
                                                <i class="fa fa-eye"></i> <?php echo $data['no_kuitansi'] ?>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr  class="td-nama">
                                        <th class="title"> Nama: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php 
                                                $dependent_field = (!empty($data['id_user']) ? urlencode($data['id_user']) : null);
                                                print_link('api/json/kuitansifix_nama_option_list/'.$dependent_field); 
                                                ?>' 
                                                data-value="<?php echo $data['nama']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("kuitansifix/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="nama" 
                                                data-title="Select a value ..." 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="select" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['nama']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-harga">
                                        <th class="title"> Harga: </th>
                                        <td class="value"><?php echo"Rp. ".number_format ($data['harga'],0,",","."); ?></td>
                                    </tr>
                                    <tr  class="td-tanggal">
                                        <th class="title"> Tanggal: </th>
                                        <td class="value"><?php 
                                            $tglnew=date_create ($data['tanggal']); 
                                            echo(date_format($tglnew,'d-m-Y'));
                                        ?></td>
                                    </tr>
                                    <tr  class="td-materi">
                                        <th class="title"> Materi: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['materi']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("kuitansifix/editfield/" . urlencode($data['id'])); ?>" 
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
                                    <tr  class="td-keterangan">
                                        <th class="title"> Keterangan: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['keterangan']; ?>" 
                                                data-pk="<?php echo $data['id'] ?>" 
                                                data-url="<?php print_link("kuitansifix/editfield/" . urlencode($data['id'])); ?>" 
                                                data-name="keterangan" 
                                                data-title="Enter Keterangan" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['keterangan']; ?> 
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
                                    <i class="fa fa-save"></i> LIHAT KUITANSI
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
                                    <a class="btn btn-sm btn-info"  href="<?php print_link("kuitansifix/edit/$rec_id"); ?>">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                    <?php } ?>
                                    <?php if($can_delete){ ?>
                                    <a class="btn btn-sm btn-danger record-delete-btn mx-1"  href="<?php print_link("kuitansifix/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
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
