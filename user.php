<?php
    class user {
        private $id = 0;
        private $fullname = '';
        private $email = '';
        private $gender = '';
        private $department = '';
        private $password= '';
        private $last_id;
        
        public $is_new = 0;
        private $is_dirty = 0;
        public $is_deleted = 0;
        private $obj_br;
        private $obj_utl;

        function __construct(){
            require_once('brokenRules.php');
            $this->obj_br = new brokenRules;
            require_once('utility.php');
            $this->obj_utl = new utilities;
        }

        function invalid_state(){
            return $this->obj_br->get_error_count();
        }
        function get_error_msg(){
            return $this->obj_br->get_error_msg();
        }
        //for distributed topology
        function set_state($value){
            $state = unserialize($value);
            $this->id = $state['id'];
            $this->fullname = $state['fullname'];
            $this->email = $state['email'];
            $this->gender = $state['gender'];
            $this->department = $state['department'];
            $this->password = $state['password'];
        }

        function get_state(){
            $state['id'] = $this->id;
            $state['fullname'] = $this->fullname;
            $state['email'] = $this->email;
            $state['gender'] = $this->gender;
            $state['department'] = $this->department;
            $state['password'] = $this->password;
            return serialize($state);
        }

        //stating set and get method of class properties
        function get_id($id=0){
            return $this->id;
        }

        function set_fullname($value){
            $this->fullname = $value;
            $this->obj_br->RuleBroken('fullname',strlen($value)==0,"Please Enter your fullname.",0);
            $this->obj_br->RuleBroken('fullname',is_numeric($value),"Enter a valid name!!!",1);
            $this->is_dirty = 1;
        }

        function get_fullname(){
            return $this->fullname;
        }

        function set_email($value){
            $this->email = $value;
            $this->obj_br->RuleBroken('email',strlen($value)==0,"Please enter a valid email!!!",0);
            $this->obj_br->RuleBroken('email',$value =  $this->obj_utl->select_query("SELECT email FROM tbl_user WHERE email = '$value'") ,"Email already exist!!!",1);
            $this->is_dirty = 1;
        }
        
        function get_email(){
            return $this->email;
        }

        function set_gender($value){
            $this->gender = $value;
            $this->obj_br->RuleBroken('gender',strlen($value)==0,"Please select your gender!!!",0);
            $this->is_dirty = 1;
        }
        
        function get_gender(){
            return $this->gender;
        }

        function set_department($value){
            $this->department = $value;
            $this->obj_br->RuleBroken('department',strlen($value)==0,"Please select your department!!!",0);
            $this->is_dirty = 1;
        }

        function get_department(){
            return $this->department;
        }

        function set_password($value){
            $this->password = $value;
            $this->obj_br->RuleBroken('password',strlen($value)==0,"Please enter your password!",0);
            $this->obj_br->RuleBroken('password',strlen($value)<8,"Please password must be 8 character",1);
            $this->obj_br->RuleBroken('password',strlen($value)>8,"Please password must be 8 character",2);
            $this->is_dirty = 1;
        }

        function get_password(){
            return $this->password;
        }

        // function count_user($fullname){
            
        // }

        function search_by_name($fullname){
            $sql  = "SELECT * FROM tbl_user WHERE fullname like '$fullname%'"; 
        }

        function fecth_edit($id=0){
            $sql = "SELECT * FROM tbl_user WHERE id = '$id' ";

            foreach ($row as $key => $value) {
                //q: what if am fecthing with name and not ids
                $this->id = $value['id'];
                $this->fullname = $value['fullname'];
                $this->email = $value['email'];
                $this->gender = $value['gender'];
                $this->department = $value['department'];
                $this->password = $value['password'];

                $this->is_new = 0;
                $this->is_dirty = 0;
                $this->is_deleted = 0;
            }
        }

        function apply_edit($id=0){
            if($this->invalid_state()){return false;}
            if($this->is_deleted){
                $sql = "DELETE FROM tbl_user WHERE id = '$id' ";
            }elseif($this->is_dirty){
                if($this->is_new){
                    $sql = "INSERT INTO tbl_user (fullname,email,gender,department,password) VALUES ('$this->fullname','$this->email','$this->gender','$this->department','$this->password')";
                }else {
                    $sql = "UPDATE tbl_user SET fullname = '$this->fullname', email = '$this->email' , gender = '$this->gender', department = '$this->department', password = '$this->password'";
                }
            }
            
            $this->obj_utl->action_query($sql);
            $this->is_new = 0;
            $this->is_dirty = 0;
            $this->is_deleted = 0;
            return true;
        }
    
    }
?>