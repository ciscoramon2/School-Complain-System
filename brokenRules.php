<?php
    class brokenRules 
    {
        private $arr_msg=array();

        function RuleBroken($rule,$is_broken,$err_msg,$n=0){
            if($is_broken){
                $this->arr_msg[$rule][$n]=$err_msg;
            }else{
                unset($this->arr_msg[$rule][$n]);
            }
        }

        function get_error_count(){
            return count($this->arr_msg);
        }

        function get_error_msg(){
            $txt='';
            foreach ($this->arr_msg as $key => $value) {
               foreach ($value as $k => $v) {
                    $txt .= $v.'<br>';
               }
            }
            return $txt;
        }

    }
    
?>