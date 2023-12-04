<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Emails extends Controller {

    public function __construct()
	{
		parent:: __construct();
		$this->call->model('user_model');
        $this->call->library('session');
        $this->call->helper('url');
        // $this->send = $this->user_model->users();
	}
   

	public function send_email_to(){

        $sender = $this->io->post('sender');
        $receiver = $this->io->post('receiver');
        $subject = $this->io->post('subject');
        $message = $this->io->post('content');
        
        // $img = $_FILES["userfile"]["name"];      

		$this->call->library('upload', $_FILES["userfile"]);
		$this->upload
			->set_dir('public')
			->allowed_extensions(array('jpg'))
			->allowed_mimes(array('image/jpeg'))
			->is_image();
		if($this->upload->do_upload()) {
			$data['filename'] = $this->upload->get_filename();
        $path = "public/" . $this->upload->get_filename();
			// $this->call->view('home', $data);   
            $this->call->library('email');
        $this->email->sender($sender);
        $this->email->recipient($receiver);
        $this->email->subject($subject);
        $this->email->email_content($message);
        $this->email->attachment($path);



        // $fullContent = "Hello, <br><br>This is a sample email.<br>These are the email's contents: <br>" . $content;
        // $this->email->sender($this->session->userdata('userEmail'), $name);
        // $this->email->recipient($recepient_email);
        // $this->email->subject($subject);
        // $this->email->email_content($fullContent,'html');
        // $this->email->attachment($path);
        // $this->email->send();
        if ($this->email->send())
        {
            // $dataa['users'] = $this->user_model->retrieveuser($this->session->userdata('id'));
            $this->call->view('success');
        }    
    }

    
		
}



    public function register()
    {
        $this->call->view('register');
    }
    public function success()
    {
        $this->call->view('success');
    }

    public function login()
    {
        $this->call->view('login');
    }
    public function sendemailview()
    {
        $this->call->view('sendemailview');
    }

    public function home($id)
    {
        // if($this->user_model->isLoggedin()){
		$data['users'] = $this->user_model->retrieveuser($this->session->userdata('id'));
        $this->call->view('home', $data);
        // redirect('home/'. $id);

		// } else {
		// 	redirect('login');
		// }
    }

    public function approveusers($id) {
    $data = $this->user_model->approveusers($id);
    
     redirect('login');
}

    public function registeruser()
    {
        $fullname = $this->io->post('fullname');
        $email = $this->io->post('email');
        $password = $this->io->post('password');

        $result = $this->user_model->adduser(
        $fullname,
        $email,
        $password);

        if($result)
        redirect('register');
    }

public function process_login() {
    // $this->call->library('session');

    $email = $this->io->post('email');
    $password = $this->io->post('password');

    $user_data = $this->user_model->log($email);
    $user_data = $this->user_model->passlog($password);

    if ($user_data) {
        if ($user_data['status'] == 'Pending') {
            // redirect('sendemail/'. $user_data['id']);
            // exit;


            $u = $this->user_model->users();
            // $send = $this->send;
            $this->call->library('email');
            $this->email->sender('your@example.com', 'Your Name');
            $this->email->recipient($user_data['email']);
    
            $this->email->subject('Email Test');
            // $this->email->email_content('<a href="' . site_url("approveusers") . "/" . $user_data['id'] . '">Verify</a>', 'html');
            $this->email->email_content('Click <a href="' . site_url("approveusers") . "/" . $user_data['id'] . '">here</a> to verify your account', 'html');


            $this->email->send();
            echo 'Email has been sent';
        }
        else if ($user_data['password'] == $password) {
            $this->session->set_userdata(array('email' => $email, 'id' => $user_data['id'], 'loggedin' => 1));
            redirect('home/'. $user_data['id']);
            exit;
        }
    } else {
        $this->session->set_flashdata('error', 'User not found');
        redirect('login');
        exit;
    }
}

public function logout(){
    session_destroy();
    redirect('login');
}
    


    public function myhome()
    {
        $this->call->view('myhome');
    }

    public function vacancies($id) {
		$data = $this->user_model->ue($id);
		$this->call->view('Admin/vacancydetails', $data);
	}
}








//COMMENTS

// public function approveuser($id) {
//     $data = $this->user_model->approveuser($id);
//     redirect('login');
// }

    // public function upload() {
	// 	$this->call->library('upload', $_FILES["userfile"]);
	// 	$this->upload
	// 		->max_size(5)
	// 		->min_size(1)
	// 		->set_dir('public')
	// 		->allowed_extensions(array('jpg'))
	// 		->allowed_mimes(array('image/jpeg'))
	// 		->is_image()
	// 		->encrypt_name();
	// 	if($this->upload->do_upload()) {
	// 		$data['filename'] = $this->upload->get_filename();
	// 		$this->call->view('upload_form', $data);
	// 	} else {
	// 		$data['errors'] = $this->upload->get_errors();
	// 		$this->call->view('upload_form', $data);
	// 	}
	// }

    

//     public function process_login(){
		
			
//         $email = $this->io->post('email');
//         $password = $this->io->post('password');

//         if($this->user_model->log($email)) 
//                {
//                     $userdata = $this->user_model->log($email);
//                     $this->session->set_userdata(array('email' => $email,'id' => $userdata['id'], 'loggedin' => 1));
//                     redirect('home');
//                }
//                else
//               {
//               $this->session->set_flashdata('error', 'error');
//                   redirect('login');
//                   exit;
//               }
// }


   
// public function send_email(){
       
//     $send = $this->send;
//     $this->call->library('email');
//     // $data = $this->user_model->retrieveuser($this->session->userdata('id'));
//     $this->email->sender('your@example.com', 'Your Name');
//     $this->email->recipient('someone@example.com');

//     $this->email->subject('Email Test');
//     // $this->email->email_content('<a href="' . site_url('home') . "/" .$send['id'].'' . '">Verify</a>', 'html');
//     $this->email->email_content('<a href="' . site_url('home')  . '">Verify</a>', 'html');

//     // $this->email->email_content('Verify', 'html');

//     // <a href="<?=site_url('approveemployer/'.$data['emp_id'].'');>" class="btn btn-primary">Approve</a>
//     $this->email->send();
//     echo 'Email has been sent';
// }


// public function send(){
//     $sender = $this->io->post('sender');
//     $recipient = $this->io->post('recipient');
//     $subject = $this->io->post('subject');
//     $message = $this->io->post('message');

//     $img = $_FILES["userfile"]["myfile"];      

//     $this->call->library('upload', $_FILES["userfile"]);
//     $this->upload
//         ->max_size(5)
//         ->min_size(1)
//         ->set_dir('public')
//         ->allowed_extensions(array('jpg'))
//         ->allowed_mimes(array('image/jpeg'))
//         ->is_image()
//         ->encrypt_name();
//     if($this->upload->do_upload()) {
//         $data['filename'] = $this->upload->get_filename();
//         $this->call->view('upload_form', $data);
//     } else {
//         $data['errors'] = $this->upload->get_errors();
//         $this->call->view('upload_form', $data);
//     }

//     $this->call->library('email');
//     $this->email->sender($sender);
//     $this->email->recipient($recipient);
//     $this->email->subject($subject);
//     $this->email->email_content($message);
//     $this->email->attachment('./public/'. $img);
//     if ($this->email->send())
//     {
//         redirect('Test/home');
//     }
    
//     }


    // public function uploadFile(){
    //     $this->call->library('upload', $_FILES["userfile"]);
	// 	$this->upload
	// 		->set_dir('public')
	// 		->allowed_extensions(array('jpg'))
	// 		->allowed_mimes(array('image/jpeg'))
	// 		->is_image();
	// 	if($this->upload->do_upload()) {
	// 		$data['filename'] = $this->upload->get_filename();
    //         // $name = $this->io->post('name');
    //         $recepient_email = $this->io->post('email');
    //         $subject = $this->io->post('subject');
    //         $content = $this->io->post('content');
    //         $path = "public/" . $this->upload->get_filename();
    //         $this->sendAttatchedEmail($name,$recepient_email,$subject,$content,$path);
	// 		$this->call->view('success', $data);
	// 	} 
    //     // else {
	// 	// 	$data['errors'] = $this->upload->get_errors();
	// 	// 	$this->call->view('upload_form', $data);
	// 	// }
    // }
// Check if the 'id' key exists in the array
?>
 

