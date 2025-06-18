<?php 
class Global_model extends CI_Model{

public function fetch_details($where,$table) {

$query=$this->db
->where($where)
->get($table);

return $query->row_array();
}


public function fetch_details_result($where,$table) {

$query=$this->db
->where($where)
->get($table);

return $query->result_array();
}

public function add_details($table,$data) {
$query= $this->db
->insert($table,$data);
if($this->db->affected_rows() > 0){
return TRUE;
}
return FALSE;
}

public function check_regsister_email($username) {
$query = $this->db
->query("SELECT * from users
WHERE  (username = '$username') ");
return $query->row_array();
}

public function check_regsister_mobileno($mobileno) {
$query = $this->db
->query("SELECT * from users
WHERE  (username = '$mobileno') ");
return $query->row_array();
}
public function table_rows_where($where,$table) {
$query= $this->db
->where($where)
->get($table);

return $query->num_rows();
}

public function num_rows($table) {
$query= $this->db

->get($table);

return $query->num_rows();
}

public function table_rows($table) {
$query= $this->db
->get($table);
return $query->num_rows();
}

public function check_register_user($username,$password) {
$query = $this->db
->query("SELECT * from users
WHERE username = '$username' OR email = '$username' 
AND password = '$password' ");
return $query->row_array();
}

public function check_previous_bookings($user_id, $event_id) {
$query = $this->db
->query("SELECT * from bookings
WHERE user_id = '$user_id' AND event_id = '$event_id' ");
return $query->row_array();
}

public function view_all_bookings($user_id) {
$query = $this->db
->query("SELECT b.name, b.date, b.venue, a.booking_date FROM bookings a, venue b WHERE a.user_id = '$user_id' AND a.event_id = b.id");
return $query->result_array();
}
}
