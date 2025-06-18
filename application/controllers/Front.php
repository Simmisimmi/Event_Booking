<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {
public $menu;
			public $refer;
   
         public function __construct() {
            parent::__construct();
            header('X-Frame-Options: SAMEORIGIN');
            header("X-XSS-Protection: 1; mode=block");
            header("Strict-Transport-Security:max-age=31536000");
            header('X-Content-Type-Options: nosniff');
            if(!empty($_SERVER['HTTP_REFERER'])){
            $this->refer=  $_SERVER['HTTP_REFERER'];
            }
			$this->load->helper('form');
			$this->load->database();
			$this->load->helper('url');
			$this->load->library('session');
			$this->load->model('global_model','global');
		}
	
	public function index()
	{
		$this->load->view('front/login');
	}

	public function show_registration()
	{
		$this->load->view('front/registration');
	}

	public function check_register_user() {
		$post = $this->input->post();
		$email = $post['email'];
		$password=md5($post['password']);
		$check = $this->global->check_register_user($email,$password);
		if(!empty($check)){
			$this->session->set_userdata('user_id', $check['user_id']);
			$this->session->set_userdata('username', $check['username']);
			$this->flashdata('class', 'success');
			$this->flashdata('message', 'Login Successfully');
			return redirect('booking-form');
		} else {
			$this->flashdata('class', 'danger');
			$this->flashdata('message', 'Invalid Username Or Password');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	 public function flashdata($key,$message)
    {
      $this->session->set_flashdata($key,$message);
    } 

	public function register_user() {
        $post = $this->input->post();
	$mobile_no=$post['mobile_no'];
			$password=md5($post['password']);
			$user_table = 'users';
			$username = $post['name'];
		$email = $post['email'];

	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$flag = 1;
				if(!filter_var($email, FILTER_VALIDATE_INT)){
				$this->flashdata('class', 'danger');
				$this->flashdata('message', 'Please Enter Valid Mobile Number Or Email Address');
				        redirect($_SERVER['HTTP_REFERER']);

				}
			}
			
			$check_email = $this->global->check_regsister_email($email);
		
	if (!empty($check_email)){
				
				$this->flashdata('class', 'danger');
				$this->flashdata('message', 'Email Address Already Exist');
				        redirect($_SERVER['HTTP_REFERER']);

			}
				$check_mobile = $this->global->check_regsister_mobileno($mobile_no);
			if (!empty($check_mobile)){
				$this->flashdata('class', 'danger');
				$this->flashdata('message', 'Mobile Number Address Already Exist');
				        redirect($_SERVER['HTTP_REFERER']);

			}
	$count= $this->global->table_rows('users');
	$next=$count+1;
	$id=$post['id']="USR_".$next;
	$post['id'] = $id;
	$data['email'] = $email;
						$data['username'] = $username ;
						$data['contact'] =$mobile_no;
						$data['password'] =$password;
						$data['user_id'] = $id;
	$this->global->add_details($user_table,$data);
	return redirect('login');
	}

	public function logout() {
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('username');
		$this->flashdata('class', 'success');
		$this->flashdata('message', 'Logout Successfully');
		return redirect('login');
	}
	public function booking_form() {
		if($this->session->userdata('user_id') && $this->session->userdata('username')){
			$data['user_id'] = $user_id = $this->session->userdata('user_id');
			$data['username'] = $this->session->userdata('username');
			$data['events'] = $this->global->fetch_details_result(['status' => 'enable'], 'venue');
			$data['bookings'] = $this->global->fetch_details_result(['user_id' => $user_id], 'bookings');
			$this->load->view('front/event_booking_form',$data);
		} else {
			$this->flashdata('class', 'danger');
			$this->flashdata('message', 'Please Login First');
			return redirect('login');
		}
	}

	public function submit_booking() {
    $post = $this->input->post();
    $user_id = $post['user_id'];
    $event_id = $post['event'];
    
    if (empty($event_id)) {
        echo json_encode([
            'success' => false,
            'message' => 'Please select an event to book'
        ]);
        return; 
    }

    $booking_data = [
        'user_id' => $user_id,
        'event_id' => $event_id
    ];
	$check_previous = $this->global->check_previous_bookings($user_id, $event_id);

	if (!empty($check_previous)) {
		$data['success'] = false;
		$data['message'] = 'You have already booked this event.';
        echo json_encode($data);
	}
	else{
	$add_bookings = $this->global->add_details('bookings', $booking_data);

    if ($add_bookings) {
      
        $data['success'] = true;
		$data['message'] = 'Booking successful!';
        echo json_encode($data);
    } else {
        $data['success'] = false;
        $data['message'] = 'Booking failed, please try again.';
        echo json_encode($data);
    }
   }
  }

  public function view_bookings() {
		if($this->session->userdata('user_id') && $this->session->userdata('username')){
			$data['user_id'] = $user_id = $this->session->userdata('user_id');
	 		$data['username'] = $this->session->userdata('username');
			$data['past_bookings'] = $this->global->view_all_bookings($user_id);
			$this->load->view('front/view_past_bookings',$data);
		} else {
			$this->flashdata('class', 'danger');
			$this->flashdata('message', 'Please Login First');
			return redirect('login');
		}
	}

}
