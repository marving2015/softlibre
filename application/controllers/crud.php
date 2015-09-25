<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crud extends CI_Controller {
	public function __construct(){ 
	parent::__construct(); 
	
	$this->load->helper('url');
    $this->load->library(array('form_validation'));
	$this->load->model('model_empresario'); 
	} 
	public function index()
	{
		$this->load->view('header');
		$this->load->view('crud_view');
		$this->load->view('footer');
	}

	function getempresarios(){ 
		$data=array(); 
		$data['lista']=$this->model_empresario->get_empresarios(); 
		if( $data['lista']==false ){ 
			$data['type']   =false; 
			$data['message']='No hay empresarios.'; 
		}else{ 
			$data['type']=true; 
		} 
		$this->output->set_content_type('application/json')->set_output( json_encode( $data ) ); 
	} 

	function getoneempresario(){ 
		$data=array(); 
		$idempresario=(int)$this->input->post('idempresario'); 
		if( $idempresario==0 ){ 
			$data['type']   =false; 
			$data['message']='El parámetro idempresario falló.'; 
		}else{ 
			$data['empresario']=$this->model_empresario->get_empresarios( $idempresario ); 
			if( $data['empresario']==false ){ 
				$data['type']   =false; 
				$data['message']='No se encontró el empresario.'; 
			}else{ 
				$data['type']=true; 
			} 
			$this->output->set_content_type('application/json')->set_output( json_encode( $data ) ); 
		} 
	} 

	function save_form(){ 
		$data=array(); 
		$this->form_validation->set_rules('nombres', 'Nombre', 'trim|required|xss_clean'); 
		$this->form_validation->set_rules('apellidos', 'Apellidos', 'trim|required|xss_clean'); 
		$this->form_validation->set_rules('direccion', 'Direccion', 'trim|required|xss_clean');
		$this->form_validation->set_rules('ciudad', 'Ciudad', 'trim|required|xss_clean');
		$this->form_validation->set_rules('telefono', 'Telefono', 'trim|required|xss_clean');
		


		$idempresario=(int)$_POST['idempresario'];  
		unset($_POST['idempresario']); 
 
 
		if( $this->form_validation->run() === FALSE ){ 
			$data['type']   =false; 
			$data['message']=validation_errors(); 
		}else{ 
			if( $idempresario==0 ){ 
				$hecho=$this->model_empresario->save_empresario($idempresario, $_POST ); 
			}else{ 
				$hecho=$this->model_empresario->edit_empresario( $idempresario, $_POST ); 
			} 
			if( $hecho==false ){ 
				$data['type']   =false; 
				$data['message']='No se pudo guardar el empresario.'; 
			}else{ 
				$data['type']      =true; 
				$data['message']   ='El empresario ha sido guardado.'; 
				$data['idempresario']=($idempresario==0)?$hecho:$idempresario; 
			} 
		} 
		$this->output->set_content_type('application/json')->set_output( json_encode( $data ) ); 
	} 

	function delete(){ 
		$data=array(); 
		$idempresario=(int)$this->input->post('idempresario'); 
		if( $idempresario==0 ){ 
			$data['type']   =false; 
			$data['message']='El parámetro idempresario fallo.'; 
		}else{ 
			$hecho=$this->model_empresario->delete( $idempresario); 
			if( $hecho==false ){ 
				$data['type']   =false; 
				$data['message']='No se pudo eliminar.'; 
			}else{ 
				$data['type']   =true; 
				$data['message']='empresario eliminado.'; 
			} 
		} 
		$this->output->set_content_type('application/json')->set_output( json_encode( $data ) ); 
	} 
}