<?php 
$page_id = null;
$comp_model = new SharedController;
$current_page = $this->set_current_page_link();
?>
<div>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 comp-grid">
                    <h4 >Assalamualaikum Admin</h4>
                </div>
            </div>
        </div>
    </div>
    <div  class="">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-md-12 comp-grid">
                    <div class="card ">
                        <div class="card-header p-2">
                            <ul class="nav nav-justified nav-pills   justify-content-center">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#TabPage-1-Page1" role="tab" aria-selected="true">
                                        <i class="fa fa-user "></i> User
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " data-toggle="tab" href="#TabPage-1-Page2" role="tab" aria-selected="true">
                                        <i class="fa fa-tasks "></i> Absensi
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " data-toggle="tab" href="#TabPage-1-Page3" role="tab" aria-selected="true">
                                        <i class="fa fa-money "></i> Kuitansi
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane show active fade" id="TabPage-1-Page1" role="tabpanel">
                                    <div class=" ">
                                        <?php  
                                        $this->render_page("pertemuan/list?limit_count=20"); 
                                        ?>
                                    </div>
                                </div>
                                <div class="tab-pane  fade" id="TabPage-1-Page2" role="tabpanel">
                                    <div class=" ">
                                        <?php  
                                        $this->render_page("absensi/list?limit_count=20"); 
                                        ?>
                                    </div>
                                </div>
                                <div class="tab-pane  fade" id="TabPage-1-Page3" role="tabpanel">
                                    <div class=" ">
                                        <?php  
                                        $this->render_page("kuitansifix/list?limit_count=20"); 
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal for FAB Absen Masuk -->
    <div data-backdrop="true" id="modal-absen-masuk" class="modal fade" role="dialog" aria-labelledby="modal-absen-masuk" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body p-0 reset-grids">
                    <div class=" ">
                        <?php  
                        $this->render_page("absensi/add"); 
                        ?>
                    </div>
                </div>
                <div style="top: 5px; right:5px; z-index: 999;" class="position-absolute">
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">&times;</button>
                </div>
            </div>
        </div>
    </div>
</div>
