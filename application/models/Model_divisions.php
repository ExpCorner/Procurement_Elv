<?php 

class Model_divisions extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/*get the active brands information*/
	public function getActiveDivisions()
	{
		$sql = "SELECT divisions.*, users.firstname, users.lastname FROM divisions LEFT JOIN users ON divisions.head = users.id WHERE divisions.active = ?";
		$query = $this->db->query($sql, array(1));
		return $query->result_array();
	}

	/* get the brand data */
	public function getDivisionData($id = null)
	{
		if($id) {
			$sql = "SELECT divisions.*, users.firstname, users.lastname FROM divisions LEFT JOIN users ON divisions.head = users.id WHERE divisions.id = ?";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}

		$sql = "SELECT divisions.*, users.firstname, users.lastname FROM divisions LEFT JOIN users ON divisions.head = users.id";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function create($data)
	{
		if($data) {
			$insert = $this->db->insert('divisions', $data);
			return ($insert == true) ? true : false;
		}
	}

	public function update($data, $id)
	{
		if($data && $id) {
			$this->db->where('id', $id);
			$update = $this->db->update('divisions', $data);
			return ($update == true) ? true : false;
		}
	}

	public function remove($id)
	{
		if($id) {
			$this->db->where('id', $id);
			$delete = $this->db->delete('divisions');
			return ($delete == true) ? true : false;
		}
	}

}