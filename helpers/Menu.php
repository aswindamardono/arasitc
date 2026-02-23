<?php
/**
 * Menu Items
 * All Project Menu
 * @category  Menu List
 */

class Menu{
	
	
			public static $navbarsideleft = array(
		array(
			'path' => 'home', 
			'label' => 'Home', 
			'icon' => '<i class="fa fa-home "></i>'
		),
		
		array(
			'path' => 'absensi', 
			'label' => 'Absensi', 
			'icon' => '<i class="fa fa-pencil-square-o "></i>'
		),
		
		array(
			'path' => 'user', 
			'label' => 'User', 
			'icon' => '<i class="fa fa-users "></i>'
		),
		
		array(
			'path' => 'kuitansifix', 
			'label' => 'Kuitansi', 
			'icon' => '<i class="fa fa-money "></i>'
		),
		
		array(
			'path' => 'sertifikat_depan', 
			'label' => 'Sertifikat', 
			'icon' => '<i class="fa fa-files-o "></i>','submenu' => array(
		array(
			'path' => 'sertifikat_depan', 
			'label' => 'Sertifikat Kerja', 
			'icon' => '<i class="fa fa-file-code-o "></i>'
		),
		
		array(
			'path' => 'sertifikat', 
			'label' => 'Sertifikat', 
			'icon' => '<i class="fa fa-file-text-o "></i>'
		),
		
		array(
			'path' => 'sertifikat_belakang', 
			'label' => 'Sertifikat Nilai', 
			'icon' => '<i class="fa fa-file-text "></i>'
		)
	)
		)
	);
		
	
	
			public static $user_role_id = array(
		array(
			"value" => "1", 
			"label" => "1", 
		),
		array(
			"value" => "2", 
			"label" => "2", 
		),
		array(
			"value" => "3", 
			"label" => "3", 
		),);
		
			public static $account_status = array(
		array(
			"value" => "Active", 
			"label" => "Active", 
		),
		array(
			"value" => "Pending", 
			"label" => "Pending", 
		),
		array(
			"value" => "Blocked", 
			"label" => "Blocked", 
		),);
		
			public static $materi = array(
		array(
			"value" => "Office", 
			"label" => "Office (Rp.1.000.000)", 
		),
		array(
			"value" => "Design", 
			"label" => "Design (Rp.1.300.000)", 
		),
		array(
			"value" => "Programming", 
			"label" => "Programming (Rp.1.500.000)", 
		),
		array(
			"value" => "Networking", 
			"label" => "Networking (Rp.1.500.000)", 
		),
		array(
			"value" => "Robotik", 
			"label" => "Robotik (Rp.1.500.000)", 
		),);
		
}