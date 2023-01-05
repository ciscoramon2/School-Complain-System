<?php
    class complain {
        private $id = 0;
        private $user_id = '';
        private $tracking_id = '';
        private $title = '';
        private $complains = '';
        private $sugestion= '';
        private $date= '';
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
            $this->user_id = $state['user_id'];
            $this->tracking_id = $state['tracking_id'];
            $this->title = $state['title'];
            $this->complains = $state['complains'];
            $this->sugestion = $state['sugestion'];
            $this->date = $state['date'];
        }

        function get_state(){
            $state['id'] = $this->id;
            $state['user_id'] = $this->user_id;
            $state['tracking_id'] = $this->tracking_id;
            $state['title'] = $this->title;
            $state['complains'] = $this->complains;
            $state['sugestion'] = $this->sugestion;
            $state['date'] = $this->date;
            return serialize($state);
        }

        //stating set and get method of class properties
        function get_id($id=0){
            return $this->id;
        }

        function set_user_id($value){
            $this->user_id = $value;
            $this->obj_br->RuleBroken('user_id',strlen($value)==0,"Error: Please Enter your user_id.",0);
            $this->is_dirty = 1;
        }

        function get_user_id(){
            return $this->user_id;
        }

        function set_tracking_id($value){
            $this->tracking_id = $value;
            $this->obj_br->RuleBroken('tracking_id',strlen($value)==0,"Error: Please enter a valid tracking_id!!!",0);
            $this->is_dirty = 1;
        }
        
        function get_tracking_id(){
            return $this->tracking_id;
        }

        function set_title($value){
            $this->title = $value;
            $this->obj_br->RuleBroken('title',strlen($value)==0,"Error: Please enter the complain title!!!",0);
            $this->obj_br->RuleBroken('title',strlen($value)>50,"Error: Title feid is too long, Must be less than 50 characters!!!",1);
            $this->is_dirty = 1;
        }
        
        function get_title(){
            return $this->title;
        }

        function set_complains($value){
            $this->complains = $value;
            $this->obj_br->RuleBroken('complains',strlen($value)==0,"Error: Please what is the complain!!!",0);
            $this->obj_br->RuleBroken('complains',strlen($value)>10000,"Error: complain space can not take more than 10000 characters!!!",1);
            $this->is_dirty = 1;
        }

        function get_complains(){
            return $this->complains;
        }

        function set_sugestion($value){
            $this->sugestion = $value;
            $this->obj_br->RuleBroken('sugestion',strlen($value)==0,"Error: Please enter your sugestion!",0);
            $this->obj_br->RuleBroken('sugestion',strlen($value)>10000,"Error: sugestion space can not take more than 10000 characters!!!",1);
            $this->is_dirty = 1;
        }

        function get_sugestion(){
            return $this->sugestion;
        }

        function set_date($value){
            $this->date = $value;
            $this->obj_br->RuleBroken('date',strlen($value)==0,"Error: Please enter your date!",0);
            $this->is_dirty = 1;
        }

        function get_date(){
            return $this->date;
        }
        function count_user($user_id){
            
        }

        function search_by_name($user_id){
            $sql  = "SELECT * FROM tbl_complain WHERE user_id like '$user_id%'"; 
        }

        function fecth_edit($id=0){
            $sql = "SELECT * FROM tbl_complain WHERE id = '$id' ";

            foreach ($row as $key => $value) {
                //q: what if am fecthing with name and not ids
                $this->id = $value['id'];
                $this->user_id = $value['user_id'];
                $this->tracking_id = $value['tracking_id'];
                $this->title = $value['title'];
                $this->complains = $value['complains'];
                $this->sugestion = $value['sugestion'];
                $this->date = $value['date'];


                $this->is_new = 0;
                $this->is_dirty = 0;
                $this->is_deleted = 0;
            }
        }

        function apply_edit($id=0){
            if($this->invalid_state()){return false;}
            if($this->is_deleted){
                $sql = "DELETE FROM tbl_complain WHERE id = '$id' ";
            }elseif($this->is_dirty){
                if($this->is_new){
                    $sql = "INSERT INTO tbl_complain (user_id,tracking_id,title,complains,sugestion,date) VALUES ('$this->user_id','$this->tracking_id','$this->title','$this->complains','$this->sugestion','$this->date')";
                }else {
                    $sql = "UPDATE tbl_complain SET tracking_id = '$this->tracking_id' , title = '$this->title', complains = '$this->complains', sugestion = '$this->sugestion',date = '$this->date' WHERE id = '$id'";
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