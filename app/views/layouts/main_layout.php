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
			/* Color Variables */
			:root {
				--primary-color: #17A2B8;
				--primary-dark: #138496;
				--primary-light: #5BC0DE;
				--accent-color: #FF8C42;
				--accent-dark: #FF6B42;
				--text-primary: #2C3E50;
				--text-secondary: #7F8C8D;
				--border-color: #ECF0F1;
				--bg-light: #F8F9FA;
			}

			/* Mobile Topbar Display */
			#topbar {
				display: flex !important;
				visibility: visible !important;
				background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%) !important;
				box-shadow: 0 4px 12px rgba(23, 162, 184, 0.2) !important;
				border: none !important;
			}

			#topbar .navbar-brand {
				font-weight: 600;
				font-size: 18px;
				color: white !important;
				letter-spacing: 0.5px;
			}

			#topbar .navbar-brand img {
				margin-right: 8px;
				filter: brightness(0) invert(1);
			}

			#topbar .nav-link {
				color: white !important;
				transition: all 0.3s ease !important;
			}

			#topbar .nav-link:hover,
			#topbar .nav-link.active {
				color: var(--accent-color) !important;
				background-color: rgba(255, 255, 255, 0.1) !important;
				border-radius: 8px !important;
			}

			#topbar .dropdown-menu {
				background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
				border: 1px solid var(--border-color);
				box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
				border-radius: 8px;
				margin-top: 8px;
			}

			#topbar .dropdown-item {
				color: var(--text-primary);
				transition: all 0.2s ease;
				border-radius: 6px;
				margin: 4px 8px;
			}

			#topbar .dropdown-item:hover {
				background-color: var(--bg-light);
				color: var(--accent-color);
				transform: translateX(4px);
			}

			#topbar .dropdown-item i {
				margin-right: 10px;
				color: var(--accent-color);
			}

			@media (max-width: 768px) {
				#topbar {
					position: fixed !important;
					top: 0 !important;
					left: 0 !important;
					right: 0 !important;
					z-index: 998 !important;
					width: 100% !important;
					padding: 0.5rem 0 !important;
				}

				#page-wrapper {
					margin-top: 60px !important;
					padding-top: 10px !important;
				}

				#main-content {
					padding-top: 0 !important;
					margin-top: 0 !important;
				}

				#topbar .navbar-brand {
					font-size: 16px;
				}

				#topbar .navbar-brand img {
					height: 32px;
					width: auto;
				}
			}

			/* Mobile FAB Menu Item Icons */
			.mobile-fab-menu-item i {
				width: 40px;
				height: 40px;
				display: flex;
				align-items: center;
				justify-content: center;
				background: linear-gradient(135deg, var(--accent-color) 0%, var(--accent-dark) 100%);
				color: white;
				border-radius: 10px;
				margin-right: 12px;
				font-size: 18px;
				box-shadow: 0 2px 8px rgba(255, 140, 66, 0.2);
			}

			/* Mobile FAB Menu Styles */
			.mobile-fab-container {
				position: relative;
			}

			.mobile-fab {
				background: linear-gradient(135deg, var(--accent-color) 0%, var(--accent-dark) 100%);
				border: none;
				padding: 0;
				cursor: pointer;
				transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
				box-shadow: 0 4px 15px rgba(255, 107, 66, 0.3);
			}

			.mobile-fab:active,
			.mobile-fab:focus {
				outline: none;
				box-shadow: 0 6px 20px rgba(255, 107, 66, 0.4);
			}

			.mobile-fab:hover {
				background: linear-gradient(135deg, #FF9952 0%, #FF7C52 100%);
				transform: scale(1.12);
				box-shadow: 0 6px 20px rgba(255, 107, 66, 0.4);
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
				backdrop-filter: blur(4px);
			}

			.mobile-fab-menu-content {
				position: fixed;
				bottom: 80px;
				left: 50%;
				transform: translateX(-50%) scale(0.7);
				background: white;
				border-radius: 16px;
				box-shadow: 0 12px 40px rgba(0, 0, 0, 0.2);
				padding: 12px;
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
				color: var(--text-primary);
				text-decoration: none;
				border-radius: 10px;
				transition: all 0.2s ease;
				margin-bottom: 6px;
				font-weight: 500;
			}

			.mobile-fab-menu-item:last-child {
				margin-bottom: 0;
			}

			.mobile-fab-menu-item:hover {
				background: linear-gradient(135deg, rgba(23, 162, 184, 0.1) 0%, rgba(23, 162, 184, 0.05) 100%);
				transform: translateX(6px);
				color: var(--primary-color);
			}

			.mobile-fab-menu-item span {
				font-weight: 500;
				font-size: 14px;
			}

			/* Responsive */
			@media(max-width: 576px) {
				.mobile-fab-menu-content {
					min-width: 200px;
					bottom: 85px;
				}
			}

			/* Mobile Bottom Navbar Styles */
			.mobile-bottom-nav {
				position: fixed;
				bottom: 0;
				left: 0;
				right: 0;
				height: 70px;
				background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
				border-top: none;
				display: flex;
				justify-content: space-around;
				align-items: center;
				z-index: 997;
				box-shadow: 0 -4px 16px rgba(23, 162, 184, 0.2);
			}

			.mobile-bottom-nav-item {
				display: flex;
				flex-direction: column;
				align-items: center;
				justify-content: center;
				text-decoration: none;
				color: white;
				font-size: 11px;
				padding: 8px 12px;
				transition: all 0.3s ease;
				flex: 1;
				height: 100%;
				position: relative;
				margin: 0 2px;
				font-weight: 600;
				letter-spacing: 0.3px;
			}

			.mobile-bottom-nav-item::before {
				content: '';
				position: absolute;
				top: 0;
				left: 0;
				right: 0;
				height: 2px;
				background: rgba(255, 255, 255, 0.3);
				opacity: 0;
				transition: opacity 0.3s ease;
			}

			.mobile-bottom-nav-item:hover::before {
				opacity: 1;
			}

			.mobile-bottom-nav-item:hover {
				background-color: rgba(255, 255, 255, 0.15);
			}

			.mobile-bottom-nav-item:hover i {
				color: white;
				transform: scale(1.2);
			}

			.mobile-bottom-nav-item i {
				font-size: 24px;
				margin-bottom: 4px;
				color: white;
				transition: all 0.3s ease;
			}

			.mobile-bottom-nav-item span {
				font-weight: 600;
				letter-spacing: 0.3px;
			}

			#main-content {
				padding-bottom: 90px;
			}

			/* Topbar Navbar Override Styles */
			.navbar-dark .navbar-toggler {
				border-color: rgba(255, 255, 255, 0.2);
			}

			.navbar-dark .navbar-toggler:hover {
				background-color: rgba(255, 255, 255, 0.1);
			}

			.navbar-dark .navbar-toggler-icon {
				background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='30' height='30' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(255, 255, 255, 0.8)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
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
							<a href="<?php print_link('index/logout?csrf_token=' . Csrf::$token) ?>" class="mobile-fab-menu-item">
                                <i class="fa fa-sign-out"></i>
                                <span>Keluar</span>
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