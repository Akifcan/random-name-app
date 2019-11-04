<?php 

class Home extends CI_CONTROLLER{

	function __construct(){
		parent::__construct();
		$this->load->model('Name_generator');
	}

	function index(){
		return $this->load->view('home-page/index', array('names' => $this->Name_generator->get()->result()));
	}

	function filter(){
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$gender = $this->input->post('gender');
			$count = $this->input->post('count');
			$names;
			if($gender && $count){
				$names = $this->Name_generator->get($count, array('gender' => $gender))->result();
			}else if($gender){
				$names = $this->Name_generator->get(10, array('gender' => $gender))->result();
			}else if($count){
				$names = $this->Name_generator->get($count)->result();
			}
			if($names){
				echo json_encode(array(true, $this->load->view('render/list', array('names' => $names), true)));
			}
		}
	}

	function get_all(){
		$names = $this->Name_generator->get()->result();
		echo json_encode(array(true, $this->load->view('render/list', array('names' => $names), true)));
	}

}