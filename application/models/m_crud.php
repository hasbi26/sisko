<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class M_crud extends CI_Model
    {

        private $table_name;
        private $where;

        private function multi_where(){
            // print_r($this->where);
            // print_r($this->table_name);
            // exit;
            $this->db->where($this->where);
            $query = $this->db->get($this->table_name);

            // $query = $this->db->get('mytable');
           // var_dump("test", $query);
        //    $data = array(); 
        //    foreach ($query->result() as $row)
        //     {
        //             // print_r($row->username);
        //             $data[] = $row->username;
        //     }
        print_r($this->db->last_query());
        // print_r($query);
            //exit;

            return $query;
        }

        public function pub_multi_where($table, $arr){
                // print_r($this->$arr[0]);
            $this->table_name = $table;
            $this->where = $arr;
            return $this->multi_where();
        }
    }

?>