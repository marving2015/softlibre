<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Model_empresario extends CI_Model{

	function get_empresarios( $idempresario=0 ){ 
		if( $idempresario!=0 )$this->db->where('idempresario', $idempresario); 
		$query=$this->db->get('empresario'); 
		return($query->num_rows()>0)?$query->result_array():false; 
	} 	

	function save_empresario( $idempresario,$post){ 
		$this->db->insert('empresario', $post); 
		return($this->db->affected_rows()>0)?$this->db->insert_id():false; 
	} 

	function edit_empresario( $idempresario, $post ){ 
		$this->db->where('idempresario', $idempresario); 
		return $this->db->update('empresario', $post); 
	} 

	function delete( $idempresario ){ 
		$this->db->where('idempresario', $idempresario); 
		$this->db->delete('empresario'); 
		return($this->db->affected_rows()>0)?true:false; 
	} 
}

