<?php 

	class Name_generator extends CI_MODEL{

		private $table_name;
		function __construct(){
			parent::__construct();
			$this->table_name = 'names';
		}

		function get($limit=10, $where=null){
			$this->db->select('*');
			$this->db->from($this->table_name);
			$this->db->limit($limit);
			if($where){
				$this->db->where($where);
			}
			$this->db->order_by('rand()');
			return $this->db->get();
		}

	}