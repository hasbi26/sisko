<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class M_crud extends CI_Model
    {

        private $table_name;
        private $where;

        private function multi_where(){
            $this->db->where($this->where);
            $query = $this->db->get($this->table_name);
            //print_r($this->db->last_query());
            //exit;

            return $query;
        }

        private function get_all(){ //used just 1 tabel only

            $query = $this->db->get($this->table_name);

            return $query;
        }

        public function pub_multi_where($table, $arr){
                // print_r($this->$arr[0]);
            $this->table_name = $table;
            $this->where = $arr;
            return $this->multi_where();
        }

        public function all($table){

            $this->table_name = $table;
            return $this->get_all();

        }

        public function customQuery($query){

		    $resp = $this->db->query($query);

            return $resp;

        }
    }

?>