<?php
$comp_model = new SharedController;
$page_element_id = "add-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$show_header = $this->show_header;
$view_title = $this->view_title;
$redirect_to = $this->redirect_to;
$username_val = $this->set_field_value('username_absensi', USER_NAME);
$id_user_val = $this->set_field_value('id_user', USER_ID);
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="add" data-display-type=""
    data-page-url="<?php print_link($current_page); ?>">
    <?php
    if ($show_header == true) {
        ?>
        <div class="bg-white p-3 mb-4" style="border-top: 3px solid #222; border-bottom: 3px solid #222;">
            <div class="container text-center">
                <h4 class="font-weight-bold text-uppercase m-0"
                    style="letter-spacing: 1.5px; color: #000; font-size: 1.4rem;">
                    KONFIRMASI ABSENSI MASUK
                </h4>
            </div>
        </div>
        <?php
    }
    ?>
    <div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 comp-grid">
                    <?php $this::display_page_errors(); ?>
                    <div class="animated fadeIn page-content">
                        <div class="card p-4 p-md-5 my-2"
                            style="border: 2.5px solid #222; border-radius: 12px; box-shadow: 5px 5px 0px #222; background-color: #ffffff;">

                            <!-- Icon Clock Avatar -->
                            <div class="d-flex justify-content-center mb-3">
                                <div
                                    style="width: 72px; height: 72px; background-color: #ffd166; border: 2.5px solid #222; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 3px 3px 0px #222;">
                                    <span style="font-size: 34px; line-height: 1;">⏰</span>
                                </div>
                            </div>

                            <!-- Greeting Title -->
                            <h3 class="text-center font-weight-extrabold text-dark mb-2"
                                style="font-weight: 800; letter-spacing: 0.5px;">
                                HALO, <?php echo strtoupper(htmlspecialchars($username_val)); ?>! 👋
                            </h3>

                            <!-- Confirmation Text -->
                            <p class="text-center font-weight-bold text-dark mb-3" style="font-size: 1.05rem;">
                                Apakah Anda yakin ingin melakukan
                                <span
                                    style="background-color: #00e676; color: #111; padding: 2px 8px; border-radius: 4px; border: 2px solid #222; font-weight: 700; display: inline-block;">Absen
                                    Masuk</span>
                                sekarang?
                            </p>

                            <!-- Date Time Badge -->
                            <div class="d-flex justify-content-center mb-3">
                                <div
                                    style="background-color: #48dbfb; color: #111; padding: 8px 18px; border-radius: 6px; border: 2px solid #222; font-weight: 800; font-size: 1rem; box-shadow: 3px 3px 0px #222;">
                                    📅 <?php echo date('d M Y'); ?> &nbsp;|&nbsp; ⏰ <?php echo date('H:i'); ?> WIB
                                </div>
                            </div>

                            <!-- Encouraging message -->
                            <p class="text-center text-muted small font-weight-bold mb-4" style="font-size: 0.88rem;">
                                Semangat untuk ngoding, berkreasi dalam desain, dan mengerjakan project yaa! 🚀✨
                            </p>

                            <!-- Form -->
                            <form id="absensi-add-form" role="form" novalidate enctype="multipart/form-data"
                                class="form page-form form-horizontal needs-validation"
                                action="<?php print_link("absensi/add?csrf_token=$csrf_token") ?>" method="post">

                                <!-- Hidden inputs for id_user and username_absensi -->
                                <input id="ctrl-id_user" value="<?php echo htmlspecialchars($id_user_val); ?>"
                                    type="hidden" name="id_user" />
                                <input id="ctrl-username_absensi" value="<?php echo htmlspecialchars($username_val); ?>"
                                    type="hidden" name="username_absensi" />

                                <div class="form-ajax-status"></div>

                                <div class="form-group mb-0 text-center">
                                    <button class="btn btn-block py-3 text-dark font-weight-bold text-uppercase"
                                        type="submit"
                                        style="background-color: #00e676; border: 2.5px solid #222; border-radius: 8px; box-shadow: 4px 4px 0px #222; font-size: 1.1rem; letter-spacing: 1px; transition: all 0.2s;">
                                        <i class="fa fa-check-circle mr-1"></i> YA, ABSEN MASUK!
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>