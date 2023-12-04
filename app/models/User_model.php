    <?php
    defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

    class User_model extends Model {

        public function __construct() {
            parent:: __construct();
            $this->call->database();
            // $this->call->library('session');
        }

    //     public function getUsers()
    // {
    //     return $this->db->table('emailtb')->where('id', $id)->get();
    // }

        public function adduser($fullname, $email, $password)
        {
            $data = array(
                'fullname' => $fullname,
                'email' => $email,
                'password' => $password,
                // "password"=> password_hash($password,PASSWORD_DEFAULT),
            );
            return $this->db->table('emailtb') -> insert($data);
            if($result)
            return true;
        }

        public function validate($email, $password) {
            $data = [
                'email' => $email,
                'password' => $password,
            ];
        
            $result = $this->db->table('emailtb')->where($data)->get();

            if($result){
                $this->session->set_userdata(array('email' => $email, 'loggedin' => 1));
                return true;
            }
        }

        public function log($email) {

            return $this->db->table('emailtb')->where('email', $email)->get();

        }

        public function passlog($password) {

            return $this->db->table('emailtb')->where('password', $password)->get();

        }

        public function retrieveuser($id)
        {
            return $this->db->table('emailtb')->where('id', $id)->get_all();
        }

        // public function approveuser($id) {
        //     // $data = ($status == 'Approved');
        //     $data = [
        //         'status' => 'Approved'
        //     ];
        //     return $this->db->table('emailtb')
        //                 ->where('id', $id)
        //                 ->update($data);
        // }

        // public function approveuser($id) {
        //     // $data = ($status == 'Approved');
        //     $data = [
        //         'status' => 'Approved'
        //     ];
        //     return $this->db->table('emailtb')
        //                 ->where('id', $id)
        //                 ->update($data);
        // }
        

        public function isLoggedIn(){
            if($this->session->userdata('loggedin') === 1)
                return true;
        }

        public function users()
        {
            // return $this->db->table('emailtb')->get();
        return $this->db->table('emailtb')->get();

        }

        public function approveusers($id) {
            // $data = ($status == 'Approved');
            $data = [
                'status' => 'Approved'
            ];
            return $this->db->table('emailtb')
                        ->where('id', $id)
                        ->update($data);
        }

        public function ue($id) {
            return $this->db->table('emailtb')
                        ->where('id', $id)
                        ->get();
        }
    }
    ?>