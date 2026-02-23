<?php 
$page_id = null;
$comp_model = new SharedController;
$current_page = $this->set_current_page_link();
?>
<div>
    <div  class="">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 comp-grid">
                    <h2 class="record-title"><br>Selamat Datang di Zona Technopreneur <br></h2>
                        <div class=""><div>
                            <img src="<?php print_link("assets/images/logo stiker shadow.png") ?>">
                                <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div  class="">
                <div class="container">
                    <div class="row ">
                        <div class="col-md-12 comp-grid">
                            <?php $modal_id = "modal-absen-masuk"; ?>
                            <button data-toggle="modal" data-target="#<?php  echo $modal_id ?>"  class="btn btn-success">
                                <i class="fa fa-sign-in "></i>                                  
                                Absen Masuk 
                            </button>
                            <div data-backdrop="true" id="<?php  echo $modal_id ?>" class="modal fade"  role="dialog" aria-labelledby="<?php  echo $modal_id ?>" aria-hidden="true">
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
                    </div>
                </div>
            </div>
            <div  class="">
                <div class="container">
                    <div class="row ">
                        <div class="col-md-12 comp-grid">
                            <div class="card ">
                                <div class="card-header p-0 pt-2 px-2">
                                    <ul class="nav nav-justified nav-tabs   ">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#TabPage-1-Page1" role="tab" aria-selected="true">
                                                <i class="fa fa-pencil "></i> Absensi
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " data-toggle="tab" href="#TabPage-1-Page2" role="tab" aria-selected="true">
                                                <i class="fa fa-money "></i> Pembayaran
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " data-toggle="tab" href="#TabPage-1-Page3" role="tab" aria-selected="true">
                                                <i class="fa fa-file-text "></i> Sertifikat
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane show active fade" id="TabPage-1-Page1" role="tabpanel">
                                            <div class=" ">
                                                <?php  
                                                $this->render_page("absensi/list?limit_count=20"); 
                                                ?>
                                            </div>
                                        </div>
                                        <div class="tab-pane  fade" id="TabPage-1-Page2" role="tabpanel">
                                            <div class=" ">
                                                <?php  
                                                $this->render_page("kuitansifix/list?limit_count=20"); 
                                                ?>
                                            </div>
                                        </div>
                                        <div class="tab-pane  fade" id="TabPage-1-Page3" role="tabpanel">
                                            <div class=" ">
                                                <?php  
                                                $this->render_page("sertifikat_depan/list?limit_count=20"); 
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
        </div>
