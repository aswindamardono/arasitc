<?php
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("kuitansifix/add");
$can_edit = ACL::is_allowed("kuitansifix/edit");
$can_view = ACL::is_allowed("kuitansifix/view");
$can_delete = ACL::is_allowed("kuitansifix/delete");
?>
<?php
$comp_model = new SharedController;
$page_element_id = "list-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
//Page Data From Controller
$view_data = $this->view_data;
$records = $view_data->records;
$record_count = $view_data->record_count;
$total_records = $view_data->total_records;
$field_name = $this->route->field_name;
$field_value = $this->route->field_value;
$view_title = $this->view_title;
$show_header = $this->show_header;
$show_footer = $this->show_footer;
$show_pagination = $this->show_pagination;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="list" data-display-type="table"
    data-page-url="<?php print_link($current_page); ?>">
    <?php
    if ($show_header == true) {
        ?>
        <div class="bg-light p-3 mb-3">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col ">
                        <h4 class="record-title">Kuitansi</h4>
                    </div>
                    <div class="col-sm-3 ">
                        <?php if ($can_add) { ?>
                            <a class="btn btn btn-primary my-1" href="<?php print_link("kuitansifix/add") ?>">
                                <i class="fa fa-plus"></i>
                                Add New Kuitansifix
                            </a>
                        <?php } ?>
                    </div>
                    <div class="col-sm-4 ">
                        <form class="search" action="<?php print_link('kuitansifix'); ?>" method="get">
                            <div class="input-group">
                                <input value="<?php echo get_value('search'); ?>" class="form-control" type="text"
                                    name="search" placeholder="Search" />
                                <div class="input-group-append">
                                    <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-12 comp-grid">
                        <div class="">
                            <!-- Page bread crumbs components-->
                            <?php
                            if (!empty($field_name) || !empty($_GET['search'])) {
                                ?>
                                <hr class="sm d-block d-sm-none" />
                                <nav class="page-header-breadcrumbs mt-2" aria-label="breadcrumb">
                                    <ul class="breadcrumb m-0 p-1">
                                        <?php
                                        if (!empty($field_name)) {
                                            ?>
                                            <li class="breadcrumb-item">
                                                <a class="text-decoration-none" href="<?php print_link('kuitansifix'); ?>">
                                                    <i class="fa fa-angle-left"></i>
                                                </a>
                                            </li>
                                            <li class="breadcrumb-item">
                                                <?php echo (get_value("tag") ? get_value("tag") : make_readable($field_name)); ?>
                                            </li>
                                            <li class="breadcrumb-item active text-capitalize font-weight-bold">
                                                <?php echo (get_value("label") ? get_value("label") : make_readable(urldecode($field_value))); ?>
                                            </li>
                                        <?php
                                        }
                                        ?>
                                        <?php
                                        if (get_value("search")) {
                                            ?>
                                            <li class="breadcrumb-item">
                                                <a class="text-decoration-none" href="<?php print_link('kuitansifix'); ?>">
                                                    <i class="fa fa-angle-left"></i>
                                                </a>
                                            </li>
                                            <li class="breadcrumb-item text-capitalize">
                                                Search
                                            </li>
                                            <li class="breadcrumb-item active text-capitalize font-weight-bold">
                                                <?php echo get_value("search"); ?></li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </nav>
                                <!--End of Page bread crumbs components-->
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
    <div class="">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-md-12 comp-grid">
                    <?php $this::display_page_errors(); ?>
                    <div class=" animated slideInLeft page-content">
                        <div id="kuitansifix-list-records">
                            <div id="page-report-body" class="table-responsive responsive-collapse-wrapper">
                                <table class="table responsive-collapse-table table-sm text-left">
                                    <thead class="table-header bg-light">
                                        <tr>
                                            <?php if ($can_delete) { ?>
                                                <th class="td-checkbox d-none d-md-table-cell">
                                                    <label class="custom-control custom-checkbox custom-control-inline">
                                                        <input class="toggle-check-all custom-control-input"
                                                            type="checkbox" />
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                </th>
                                            <?php } ?>
                                            <th class="td-sno">NO</th>
                                            <th class="td-tanggal">TANGGAL <span class="sort-icon"><i class="fa fa-sort"></i></span></th>
                                            <th class="td-harga">NOMINAL <span class="sort-icon"><i class="fa fa-sort"></i></span></th>
                                            <th class="td-nama">NAMA <span class="sort-icon"><i class="fa fa-sort"></i></span></th>
                                            <th class="td-no_kuitansi d-none d-md-table-cell">NO KUITANSI</th>
                                            <th class="td-materi d-none d-md-table-cell">MATERI</th>
                                            <th class="td-keterangan d-none d-md-table-cell">KETERANGAN</th>
                                            <th class="td-btn d-none d-md-table-cell text-center">AKSI</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    if (!empty($records)) {
                                        ?>
                                        <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                            <!--record-->
                                            <?php
                                            $counter = 0;
                                            foreach ($records as $data) {
                                                $rec_id = (!empty($data['id']) ? urlencode($data['id']) : null);
                                                $counter++;
                                                ?>
                                                <tr class="main-row" data-record-id="<?php echo $data['id']; ?>">
                                                    <?php if ($can_delete) { ?>
                                                        <td class="td-checkbox d-none d-md-table-cell">
                                                            <label class="custom-control custom-checkbox custom-control-inline">
                                                                <input class="optioncheck custom-control-input" name="optioncheck[]"
                                                                    value="<?php echo $data['id'] ?>" type="checkbox" />
                                                                <span class="custom-control-label"></span>
                                                            </label>
                                                        </td>
                                                    <?php } ?>
                                                    <td class="td-sno">
                                                        <span class="collapse-btn-circle d-md-none" title="Detail">
                                                            <i class="fa fa-plus icon-state"></i>
                                                        </span>
                                                        <span class="row-num"><?php echo $counter; ?></span>
                                                    </td>
                                                    <td class="td-tanggal">
                                                        <span>
                                                            <?php
                                                            $tglnew = date_create($data['tanggal']);
                                                            echo (date_format($tglnew, 'd-m-Y'));
                                                            ?>
                                                        </span>
                                                    </td>
                                                    <td class="td-harga font-weight-bold text-nowrap">
                                                        <span><?php echo "Rp " . number_format($data['harga'], 0, ",", "."); ?></span>
                                                    </td>
                                                    <td class="td-nama">
                                                        <span <?php if ($can_edit) { ?> data-source='<?php
                                                           $dependent_field = (!empty($data['id_user']) ? urlencode($data['id_user']) : null);
                                                           print_link('api/json/kuitansifix_nama_option_list/' . $dependent_field);
                                                           ?>' data-value="<?php echo $data['nama']; ?>"
                                                                data-pk="<?php echo $data['id'] ?>"
                                                                data-url="<?php print_link("kuitansifix/editfield/" . urlencode($data['id'])); ?>"
                                                                data-name="nama" data-title="Select a value ..."
                                                                data-placement="left" data-toggle="click" data-type="select"
                                                                data-mode="popover" data-showbuttons="left" class="is-editable"
                                                            <?php } ?>>
                                                            <?php echo $data['nama']; ?>
                                                        </span>
                                                    </td>
                                                    <td class="td-no_kuitansi d-none d-md-table-cell">
                                                        <span <?php if ($can_edit) { ?>
                                                                data-source='<?php print_link('api/json/kuitansifix_no_kuitansi_option_list'); ?>'
                                                                data-value="<?php echo $data['no_kuitansi']; ?>"
                                                                data-pk="<?php echo $data['id'] ?>"
                                                                data-url="<?php print_link("kuitansifix/editfield/" . urlencode($data['id'])); ?>"
                                                                data-name="no_kuitansi" data-title="Select a value ..."
                                                                data-placement="left" data-toggle="click" data-type="select"
                                                                data-mode="popover" data-showbuttons="left" class="is-editable"
                                                            <?php } ?>>
                                                            <?php echo $data['no_kuitansi']; ?>
                                                        </span>
                                                    </td>
                                                    <td class="td-materi d-none d-md-table-cell">
                                                        <span <?php if ($can_edit) { ?>
                                                                data-value="<?php echo $data['materi']; ?>"
                                                                data-pk="<?php echo $data['id'] ?>"
                                                                data-url="<?php print_link("kuitansifix/editfield/" . urlencode($data['id'])); ?>"
                                                                data-name="materi" data-title="Enter Materi" data-placement="left"
                                                                data-toggle="click" data-type="text" data-mode="popover"
                                                                data-showbuttons="left" class="is-editable" <?php } ?>>
                                                            <?php echo $data['materi']; ?>
                                                        </span>
                                                    </td>
                                                    <td class="td-keterangan d-none d-md-table-cell">
                                                        <span <?php if ($can_edit) { ?>
                                                                data-value="<?php echo $data['keterangan']; ?>"
                                                                data-pk="<?php echo $data['id'] ?>"
                                                                data-url="<?php print_link("kuitansifix/editfield/" . urlencode($data['id'])); ?>"
                                                                data-name="keterangan" data-title="Enter Keterangan"
                                                                data-placement="left" data-toggle="click" data-type="text"
                                                                data-mode="popover" data-showbuttons="left" class="is-editable"
                                                            <?php } ?>>
                                                            <?php echo $data['keterangan']; ?>
                                                        </span>
                                                    </td>
                                                    <td class="td-btn d-none d-md-table-cell text-center text-nowrap">
                                                        <?php if ($can_view) { ?>
                                                            <a class="btn btn-sm btn-success has-tooltip" title="Lihat"
                                                                href="<?php print_link("kuitansifix/view/$rec_id"); ?>">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                        <?php } ?>
                                                        <?php if ($can_edit) { ?>
                                                            <a class="btn btn-sm btn-info has-tooltip" title="Edit"
                                                                href="<?php print_link("kuitansifix/edit/$rec_id"); ?>">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                        <?php } ?>
                                                        <?php if ($can_delete) { ?>
                                                            <a class="btn btn-sm btn-danger has-tooltip record-delete-btn"
                                                                title="Hapus"
                                                                href="<?php print_link("kuitansifix/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>"
                                                                data-prompt-msg="Are you sure you want to delete this record?"
                                                                data-display-style="modal">
                                                                <i class="fa fa-times"></i>
                                                            </a>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                                <!-- Child row for Mobile View (Image 2 design) -->
                                                <tr class="detail-row d-md-none" style="display: none;">
                                                    <td colspan="4" class="detail-td p-0">
                                                        <div class="detail-content-wrap">
                                                            <div class="detail-item-list">
                                                                <div class="detail-row-item">
                                                                    <span class="detail-label">No Kuitansi</span>
                                                                    <span class="detail-val">
                                                                        <span class="badge badge-light border text-dark font-weight-normal px-2 py-1">
                                                                            <?php echo $data['no_kuitansi']; ?>
                                                                        </span>
                                                                    </span>
                                                                </div>
                                                                <div class="detail-row-item">
                                                                    <span class="detail-label">Materi</span>
                                                                    <span class="detail-val">
                                                                        <?php echo !empty($data['materi']) ? $data['materi'] : '-'; ?>
                                                                    </span>
                                                                </div>
                                                                <div class="detail-row-item">
                                                                    <span class="detail-label">Keterangan</span>
                                                                    <span class="detail-val text-muted">
                                                                        <?php echo !empty($data['keterangan']) ? $data['keterangan'] : '-'; ?>
                                                                    </span>
                                                                </div>
                                                                <?php if ($can_delete) { ?>
                                                                    <div class="detail-row-item">
                                                                        <span class="detail-label">Pilih Data</span>
                                                                        <span class="detail-val">
                                                                            <label class="custom-control custom-checkbox custom-control-inline m-0">
                                                                                <input class="optioncheck custom-control-input" name="optioncheck[]"
                                                                                    value="<?php echo $data['id'] ?>" type="checkbox" />
                                                                                <span class="custom-control-label font-weight-normal text-muted small">Centang untuk hapus</span>
                                                                            </label>
                                                                        </span>
                                                                    </div>
                                                                <?php } ?>
                                                                <div class="detail-row-item align-items-center mt-2 pt-2 border-top">
                                                                    <span class="detail-label font-weight-bold">Aksi</span>
                                                                    <div class="detail-val detail-action-buttons">
                                                                        <?php if ($can_view) { ?>
                                                                            <a class="btn-detail-action btn-detail-view has-tooltip" title="Lihat Detail"
                                                                                href="<?php print_link("kuitansifix/view/$rec_id"); ?>">
                                                                                <i class="fa fa-eye"></i>
                                                                            </a>
                                                                        <?php } ?>
                                                                        <?php if ($can_edit) { ?>
                                                                            <a class="btn-detail-action btn-detail-edit has-tooltip" title="Edit Data"
                                                                                href="<?php print_link("kuitansifix/edit/$rec_id"); ?>">
                                                                                <i class="fa fa-edit"></i>
                                                                            </a>
                                                                        <?php } ?>
                                                                        <?php if ($can_delete) { ?>
                                                                            <a class="btn-detail-action btn-detail-delete has-tooltip record-delete-btn"
                                                                                title="Hapus Data"
                                                                                href="<?php print_link("kuitansifix/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>"
                                                                                data-prompt-msg="Are you sure you want to delete this record?"
                                                                                data-display-style="modal">
                                                                                <i class="fa fa-trash"></i>
                                                                            </a>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                            <!--endrecord-->
                                        </tbody>
                                        <tbody class="search-data" id="search-data-<?php echo $page_element_id; ?>"></tbody>
                                        <?php
                                    }
                                    ?>
                                </table>
                                <?php
                                if (empty($records)) {
                                    ?>
                                    <h4 class="bg-light text-center border-top text-muted animated bounce  p-3">
                                        <i class="fa fa-ban"></i> Tidak Ada Data
                                    </h4>
                                    <?php
                                }
                                ?>
                            </div>
                            <?php
                            if ($show_footer && !empty($records)) {
                                ?>
                                <div class=" border-top mt-2">
                                    <div class="row justify-content-center">
                                        <div class="col-md-auto justify-content-center">
                                            <div class="p-3 d-flex justify-content-between">
                                                <?php if ($can_delete) { ?>
                                                    <button data-prompt-msg="Are you sure you want to delete these records?"
                                                        data-display-style="modal"
                                                        data-url="<?php print_link("kuitansifix/delete/{sel_ids}/?csrf_token=$csrf_token&redirect=$current_page"); ?>"
                                                        class="btn btn-sm btn-danger btn-delete-selected d-none">
                                                        <i class="fa fa-times"></i> Delete Selected
                                                    </button>
                                                <?php } ?>
                                                <?php $export_excel_link = $this->set_current_page_link(array('format' => 'excel')); ?>
                                                <a class="btn  btn-sm btn-primary export-link-btn" data-format="excel"
                                                    href="<?php print_link($export_excel_link); ?>" target="_blank">
                                                    <img src="<?php print_link('assets/images/xsl.png') ?>" class="mr-2" />
                                                    EXCEL
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <?php
                                            if ($show_pagination == true) {
                                                $pager = new Pagination($total_records, $record_count);
                                                $pager->route = $this->route;
                                                $pager->show_page_count = true;
                                                $pager->show_record_count = true;
                                                $pager->show_page_limit = true;
                                                $pager->limit_count = $this->limit_count;
                                                $pager->show_page_number_list = true;
                                                $pager->pager_link_range = 5;
                                                $pager->render();
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            // Support both direct click and dynamic event
            $('#kuitansifix-list-records').on('click', '.collapse-btn-circle', function(e) {
                e.preventDefault();
                e.stopPropagation();
                var $btn = $(this);
                var $mainRow = $btn.closest('tr.main-row');
                var $detailRow = $mainRow.next('tr.detail-row');
                var $icon = $btn.find('.icon-state');

                if ($btn.hasClass('is-open')) {
                    $detailRow.find('.detail-content-wrap').slideUp(180, function() {
                        $detailRow.hide();
                    });
                    $btn.removeClass('is-open');
                    $icon.removeClass('fa-minus').addClass('fa-plus');
                    $mainRow.removeClass('row-expanded');
                } else {
                    $detailRow.show();
                    $detailRow.find('.detail-content-wrap').hide().slideDown(180);
                    $btn.addClass('is-open');
                    $icon.removeClass('fa-plus').addClass('fa-minus');
                    $mainRow.addClass('row-expanded');
                }
            });

            // Mobile row click to expand
            $('#kuitansifix-list-records').on('click', 'tbody tr.main-row', function(e) {
                if ($(window).width() < 768) {
                    if ($(e.target).closest('a, button, input, .is-editable, .collapse-btn-circle, .custom-control').length === 0) {
                        $(this).find('.collapse-btn-circle').trigger('click');
                    }
                }
            });
        });
    </script>
</section>