<?php
    function json_validator($data) {
        if (!empty($data)) {
            if(is_array(json_decode($data, true))){
                return json_decode($data, true);
            }else{
                return false;
            }
            //return is_array(json_decode($data, true)) ? json_decode($data, true) : false;
        }
        return false;
    }
?>