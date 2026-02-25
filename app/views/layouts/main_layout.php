<?php
	// Set url Variable From Router Class
	$page_name = Router::$page_name;
	$page_action = Router::$page_action;
	$page_id = Router::$page_id;
	$body_class = "$page_name-" . str_ireplace('list','index', $page_action);
	$page_title = $this->get_page_title();
?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $page_title; ?></title>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<link rel="shortcut icon" href="<?php print_link(SITE_FAVICON); ?>" />
		<?php 
			Html ::  page_meta('theme-color',META_THEME_COLOR);
			Html ::  page_meta('author',META_AUTHOR); 
			Html ::  page_meta('keyword',META_KEYWORDS); 
			Html ::  page_meta('description',META_DESCRIPTION); 
			Html ::  page_meta('viewport',META_VIEWPORT);
			Html ::  page_css('font-awesome.min.css');
			Html ::  page_css('animate.css');
			Html ::  page_css('blueimp-gallery.css');
		?>
				<?php 
			Html ::  page_css('bootstrap-theme-minty-teal.css');
			Html ::  page_css('custom-style.css');
			Html ::  page_css('modern-ui.css');
            Html ::  page_css('auth.css');
		?>
		<?php
			Html ::  page_css('flatpickr.min.css');
			Html ::  page_css('bootstrap-editable.css');
			Html ::  page_css('dropzone.min.css');
			Html ::  page_js('jquery-3.3.1.min.js');
		?>
		<style>
			/* Mobile FAB Menu Styles */
			.mobile-fab-container {
				position: relative;
			}

			.mobile-fab {
				background: linear-gradient(135deg, #FF8C42 0%, #FF6B42 100%);
				border: none;
				padding: 0;
				cursor: pointer;
				transition: all 0.3s ease;
			}

			.mobile-fab:hover {
				background: linear-gradient(135deg, #FF9952 0%, #FF7C52 100%);
				transform: scale(1.1);
			}

			.mobile-fab i {
				font-size: 24px;
				color: white;
			}

			/* FAB Menu Hidden State */
			.mobile-fab-menu {
				position: fixed;
				bottom: 0;
				left: 0;
				right: 0;
				top: 0;
				z-index: 999;
				opacity: 0;
				visibility: hidden;
				transition: all 0.3s ease;
			}

			.mobile-fab-menu.active {
				opacity: 1;
				visibility: visible;
			}

			.mobile-fab-menu-overlay {
				position: absolute;
				bottom: 0;
				left: 0;
				right: 0;
				top: 0;
				background: rgba(0, 0, 0, 0.5);
				cursor: pointer;
			}

			.mobile-fab-menu-content {
				position: fixed;
				bottom: 80px;
				left: 50%;
				transform: translateX(-50%) scale(0.7);
				background: white;
				border-radius: 16px;
				box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
				padding: 8px;
				min-width: 240px;
				opacity: 0;
				transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
				pointer-events: none;
			}

			.mobile-fab-menu.active .mobile-fab-menu-content {
				opacity: 1;
				transform: translateX(-50%) scale(1);
				pointer-events: auto;
			}

			.mobile-fab-menu-item {
				display: flex;
				align-items: center;
				padding: 12px 16px;
				color: #333;
				text-decoration: none;
				border-radius: 8px;
				transition: all 0.2s ease;
				margin-bottom: 4px;
			}

			.mobile-fab-menu-item:last-child {
				margin-bottom: 0;
			}

			.mobile-fab-menu-item:hover {
				background-color: #f0f0f0;
				transform: translateX(4px);
			}

			.mobile-fab-menu-item i {
				width: 32px;
				height: 32px;
				display: flex;
				align-items: center;
				justify-content: center;
				background: linear-gradient(135deg, #FF8C42 0%, #FF6B42 100%);
				color: white;
				border-radius: 8px;
				margin-right: 12px;
				font-size: 18px;
			}

			.mobile-fab-menu-item span {
				font-weight: 500;
				font-size: 14px;
			}

			/* Responsive */
			@media(max-width: 576px) {
				.mobile-fab-menu-content {
					min-width: 200px;
				}
			}
		</style>
	</head>
	<?php 
		$page_id = "index";
		if(user_login_status() == true){
			$page_id = "main";
		}
	?>
	<body id="<?php echo $page_id ?>" class="with-login <?php echo $body_class ?>">
        <!-- Mobile Bottom Navbar -->
        <?php if(user_login_status() == true): ?>
        <?php 
            $user_role_id = get_active_user('user_role_id');
            $is_admin = ($user_role_id == 1); // Role 1 = Admin
            $is_user = ($user_role_id == 2);  // Role 2 = User
        ?>
        <div class="mobile-bottom-nav d-md-none">
            <!-- Home/Beranda - Visible to all -->
            <a href="<?php print_link('home') ?>" class="mobile-bottom-nav-item">
                <i class="fa fa-home"></i>
                <span>Beranda</span>
            </a>
            
            <!-- Profile/Profil - Visible to all -->
            <a href="<?php print_link('account') ?>" class="mobile-bottom-nav-item">
                <i class="fa fa-user"></i>
                <span>Profil</span>
            </a>
            
            <!-- Central FAB Button - Different action based on role -->
            <div class="mobile-fab-container">
                <button class="mobile-fab" id="mobile-fab-btn" type="button">
                    <?php if($is_admin): ?>
                        <i class="fa fa-caret-square-o-up"></i>
                    <?php elseif($is_user): ?>
                        <i class="fa fa-book"></i>
                    <?php endif; ?>
                </button>
                
                <!-- FAB Submenu Popup -->
                <div class="mobile-fab-menu" id="mobile-fab-menu">
                    <div class="mobile-fab-menu-overlay" id="mobile-fab-menu-overlay"></div>
                    <div class="mobile-fab-menu-content">
                        <?php if($is_admin): ?>
                            <!-- Admin Submenu Items -->
                            <a href="<?php print_link('sertifikat_depan') ?>" class="mobile-fab-menu-item" data-toggle="modal" data-target="#modal-absen-masuk">
                                <i class="fa fa-file-text"></i>
                                <span>Sertifikat Kerja</span>
                            </a>
                            <a href="<?php print_link('sertifikat') ?>" class="mobile-fab-menu-item">
                                <i class="fa fa-file-text-o"></i>
                                <span>Sertifikat Non Kerja</span>
                            </a>
                            <a href="<?php print_link('sertifikat_belakang') ?>" class="mobile-fab-menu-item">
                                <i class="fa fa-list-ol"></i>
                                <span>Nilai Sertifikat</span>
                            </a>
                        <?php elseif($is_user): ?>
                            <!-- User Submenu Items -->
                            <a href="<?php print_link('sertifikat_depan') ?>" class="mobile-fab-menu-item" data-toggle="modal" data-target="#modal-absen-masuk">
                                <i class="fa fa-file-text"></i>
                                <span>Sertifikat Kerja</span>
                            </a>
                            <a href="<?php print_link('sertifikat') ?>" class="mobile-fab-menu-item">
                                <i class="fa fa-file-text-o"></i>
                                <span>Sertifikat Non Kerja</span>
                            </a>
                            <a href="<?php print_link('sertifikat_belakang') ?>" class="mobile-fab-menu-item">
                                <i class="fa fa-list-ol"></i>
                                <span>Nilai Sertifikat</span>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
            <!-- Right side items - Different based on role -->
            <?php if($is_admin): ?>
                <!-- Admin Menu Items -->
                <a href="<?php print_link('kuitansifix') ?>" class="mobile-bottom-nav-item">
                    <i class="fa fa-money"></i>
                    <span>Kuitansi</span>
                </a>
                <a href="<?php print_link('user') ?>" class="mobile-bottom-nav-item">
                    <i class="fa fa-users"></i>
                    <span>Murid</span>
                </a>
            <?php elseif($is_user): ?>
                <!-- User Menu Items -->
                <a href="<?php print_link('kuitansifix') ?>" class="mobile-bottom-nav-item">
                    <i class="fa fa-money"></i>
                    <span>Kuitansi</span>
                </a>
                <a href="<?php print_link('index/logout?csrf_token=' . Csrf::$token) ?>" class="mobile-bottom-nav-item">
                    <i class="fa fa-sign-out"></i>
                    <span>Keluar</span>
                </a>
            <?php endif; ?>
        </div>
        <?php endif; ?>
		<div id="page-wrapper">
			<!-- Show progress bar when ajax upload-->
			<div class="progress ajax-progress-bar">
				<div class="progress-bar"></div>
			</div>
			<?php 
				$this->render_view('appheader.php'); 
			?>
			<div id="main-content">
				<!-- Page Main Content Start -->
					<div id="page-content">
						<?php $this->render_body();?>
					</div>	
				<!-- Page Main Content [End] -->
				<div class="flash-msg-container"><?php show_flash_msg(); ?></div>
				<!-- Modal page for displaying ajax page -->
				<div id="main-page-modal" class="modal fade" role="dialog">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-body p-0 reset-grids inline-page">
							</div>
							<div style="top: 5px; right:5px; z-index: 999;" class="position-absolute">
								<button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">&times;</button>
							</div>
						</div>
					</div>
				</div>
				<!-- Modal page for displaying record delete prompt -->
				<div class="modal fade" id="delete-record-modal-confirm" tabindex="-1" role="dialog" aria-labelledby="delete-record-modal-confirm" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Delete record</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"> 
									<span aria-hidden="true">&times;</span> 
								</button>
							</div>
							<div id="delete-record-modal-msg" class="modal-body"></div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
								<a href="" id="delete-record-modal-btn" class="btn btn-primary">Delete</a> 
							</div>
						</div>
					</div>
				</div>
				<!-- Image Preview Component [Start] -->
				<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
					<div class="slides"></div>
					<h3 class="title"></h3>
					<a class="prev">‹</a>
					<a class="next">›</a>
					<a class="close">×</a>
					<a class="play-pause"></a>
					<ol class="indicator"></ol>
				</div>
				<!-- Image Preview Component [End] -->
				<template id="page-loading-indicator">
					<div class="p-2 text-center m-2 text-muted m-auto">
						<div class="ajax-loader"></div>
						<h4 class="p-3 mt-2 font-weight-light">Loading...</h4>
					</div>
				</template>
				<template id="page-saving-indicator">
					<div class="p-2 text-center m-2 text-muted">
						<div class="lds-dual-ring"></div>
						<h4 class="p-3 mt-2 font-weight-light">Saving...</h4>
					</div>
				</template>
				<template id="inline-loading-indicator">
					<div class="p-2 text-center d-flex justify-content-center">
						<span class="loader mr-3"></span>
						<span class="font-weight-bold">Loading...</span>
					</div>
				</template>
			</div>
		</div>
		<script>
			var siteAddr = '<?php echo SITE_ADDR; ?>';
			var defaultPageLimit = <?php echo MAX_RECORD_COUNT; ?>;
			var csrfToken = '<?php echo Csrf :: $token; ?>';
		</script>
		<?php 
			Html ::  page_js('popper.js');
			Html ::  page_js('bootstrap-4.3.1.min.js');
		?>
		<?php
			Html ::  page_js('flatpickr.min.js');
			Html ::  page_js('bootstrap-editable.js');
			Html ::  page_js('dropzone.min.js');
			Html ::  page_js('plugins.js'); //boostrapswitch, passwordStrength, twbs-pagination, blueimp-gallery,
			Html ::  page_js('plugins-init.js');
			Html ::  page_js('page-scripts.js');
		?>
		<script>
			// Mobile FAB Menu Handler
			document.addEventListener('DOMContentLoaded', function() {
				const fabBtn = document.getElementById('mobile-fab-btn');
				const fabMenu = document.getElementById('mobile-fab-menu');
				const fabMenuOverlay = document.getElementById('mobile-fab-menu-overlay');
				const fabMenuItems = document.querySelectorAll('.mobile-fab-menu-item');

				// Toggle menu on FAB button click
				fabBtn.addEventListener('click', function(e) {
					e.preventDefault();
					e.stopPropagation();
					fabMenu.classList.toggle('active');
				});

				// Close menu on overlay click
				fabMenuOverlay.addEventListener('click', function(e) {
					e.preventDefault();
					e.stopPropagation();
					fabMenu.classList.remove('active');
				});

				// Close menu when menu item is clicked (but allow navigation)
				fabMenuItems.forEach(item => {
					item.addEventListener('click', function() {
						setTimeout(() => {
							fabMenu.classList.remove('active');
						}, 100);
					});
				});

				// Close menu when clicking outside
				document.addEventListener('click', function(e) {
					if (!fabMenu.contains(e.target) && !fabBtn.contains(e.target)) {
						fabMenu.classList.remove('active');
					}
				});

				// Close menu on escape key
				document.addEventListener('keydown', function(e) {
					if (e.key === 'Escape') {
						fabMenu.classList.remove('active');
					}
				});
			});
		</script>
	</body>
</html>