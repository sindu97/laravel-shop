<?php 
/**
 * MY Model Extends CI_Model
 */
class MY_Model extends CI_Model
{
	protected $table = "";

	function __construct()	{
		parent::__construct();
	}

	function select_all($arg = array()){
		if(isset($arg["from"])){
			$this->db->from($arg["from"]);
		}else{
			$this->db->from($this->table);
		}		
		if(isset($arg["select"])){
			$this->db->select($arg["select"]);
		}
		if(isset($arg["where"])){
			$this->db->where($arg["where"]);
		}
		if(isset($arg["like"])){
			$this->db->like($arg["like"]);
		}
		if(isset($arg["group_by"])){
			$this->db->group_by($arg["group_by"]);
		}
		if(isset($arg["order_by"])){
			$this->db->order_by($arg["order_by"]);
		}
		if(isset($arg["limit"])){
			if(isset($arg["start"])){
				$this->db->limit($arg["limit"], $arg["start"]);
			}else{
				$this->db->limit($arg["limit"]);
			}
		}
		if(isset($arg["join"])){
			if(is_array($arg["join"])){
				foreach ($arg["join"] as $join) {
					if(is_array($join)){
						$this->db->join($join["table"], $join["key"], $join["type"]);
					}else{
						throw new Exception("Join expects array as parameter.", 1);
						break;
					}
				}
			}else{
				throw new Exception("Join expects array as parameter.", 1);
			}
		}
		return $this->db->get();
	}

	function delete_row($where){
		return $this->db->delete($this->table, $where);
	}

	function insert_row($data){
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	function update_row($where, $data){
		$this->db->where($where);
		return $this->db->update($this->table, $data);
	}

	function count_all($where =array() ){
		if(count($where)){
			$this->db->where($where);
		}
		return $this->db->count_all_results($this->table);
	}

	function query($query){
		return $this->db->query($query);
	}

}
	
?>