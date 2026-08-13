<?php 

/**
 * SharedController Controller
 * @category  Controller / Model
 */
class SharedController extends BaseController{
	
	/**
     * user_username_value_exist Model Action
     * @return array
     */
	function user_username_value_exist($val){
		$db = $this->GetModel();
		$db->where("username", $val);
		$exist = $db->has("user");
		return $exist;
	}

	/**
     * user_email_value_exist Model Action
     * @return array
     */
	function user_email_value_exist($val){
		$db = $this->GetModel();
		$db->where("email", $val);
		$exist = $db->has("user");
		return $exist;
	}

	/**
     * sertifikat_depan_nama_sertifikat_option_list Model Action
     * @return array
     */
	function sertifikat_depan_nama_sertifikat_option_list($lookup_id_user){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT username AS value,username AS label FROM user WHERE id= ? ORDER BY id ASC"  ;
		$queryparams = array($lookup_id_user);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * sertifikat_depan_id_user_option_list Model Action
     * @return array
     */
	function sertifikat_depan_id_user_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT id AS value,username AS label FROM user ORDER BY id DESC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * kuitansifix_no_kuitansi_option_list Model Action
     * @return array
     */
	function kuitansifix_no_kuitansi_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT DISTINCT username_absensi AS value , username_absensi AS label FROM absensi ORDER BY label ASC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * kuitansifix_nama_option_list Model Action
     * @return array
     */
	function kuitansifix_nama_option_list($lookup_id_user){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT username AS value,username AS label FROM user WHERE id= ? ORDER BY id ASC" ;
		$queryparams = array($lookup_id_user);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * kuitansifix_id_default_value Model Action
     * @return Value
     */
	function kuitansifix_id_default_value(){
		$db = $this->GetModel();
		$sqltext = "SELECT max(id) as maxID FROM kuitansifix";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * kuitansifix_id_user_option_list Model Action
     * @return array
     */
	function kuitansifix_id_user_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT id AS value,username AS label FROM user ORDER BY id DESC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * sertifikat_belakang_nama_sertifikat_option_list Model Action
     * @return array
     */
	function sertifikat_belakang_nama_sertifikat_option_list($lookup_id_user){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT username AS value,username AS label FROM user WHERE id= ? ORDER BY id ASC" ;
		$queryparams = array($lookup_id_user);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * sertifikat_belakang_id_user_option_list Model Action
     * @return array
     */
	function sertifikat_belakang_id_user_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT id AS value,username AS label FROM user ORDER BY id DESC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * sertifikat_nama_sertifikat_option_list Model Action
     * @return array
     */
	function sertifikat_nama_sertifikat_option_list($lookup_id_user){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT username AS value,username AS label FROM user WHERE id= ? ORDER BY id ASC" ;
		$queryparams = array($lookup_id_user);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * sertifikat_id_user_option_list Model Action
     * @return array
     */
	function sertifikat_id_user_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT id AS value,username AS label FROM user ORDER BY id DESC";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * sertifikat_existing_no_sertifikat Model Action
     * @return array
     */
	function sertifikat_existing_no_sertifikat(){
		$db = $this->GetModel();
		$sqltext = "SELECT DISTINCT no_sertifikat FROM sertifikat WHERE no_sertifikat IS NOT NULL AND no_sertifikat != ''";
		$records = $db->rawQuery($sqltext);
		$existing = array();
		if(!empty($records)){
			foreach($records as $r){
				$existing[] = $r['no_sertifikat'];
			}
		}
		return $existing;
	}

	/**
     * get_pending_user_count Model Action
     * @return int
     */
	function get_pending_user_count(){
		$db = $this->GetModel();
		$db->where("account_status", "Pending");
		$db->where("user_role_id", "0");
		return $db->getValue("user", "count(*)");
	}

}

