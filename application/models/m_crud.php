<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class M_crud extends CI_Model
    {

        private $table_name;
        private $where;

        private $limit;
        private $start;
        private $orderBy;
        private $orderType;

        private $body;

        private function multi_where(){
            $this->db->where($this->where);
            $query = $this->db->get($this->table_name);
            //print_r($this->db->last_query());
            //exit;

            return $query;
        }

        private function get_all(){ //used just 1 tabel only

            $this->db->select('*');
            $this->db->from($this->table_name);

            if($this->limit !== "" && $this->start !== ""){
                $this->db->limit($this->start, $this->limit);
            }

            if($this->orderBy !== "" && $this->orderType !== ""){
                $this->db->order_by($this->orderBy, $this->orderType);
            }

            $query = $this->db->get();
            //print_r($this->db->last_query());
            //exit;

            return $query;
        }

        private function update_where(){
            $this->db->where($this->where);
            $update = $this->db->update($this->table_name, $this->body);

            return $update;
        }

        private function delete_where(){
            $this->db->where($this->where);
            $update = $this->db->delete($this->table_name);
            print_r($this->db->last_query());
            return ($this->db->affected_rows() > 0) ? TRUE : FALSE;

            // return $update;
        }

        public function pub_multi_where($table, $arr){
                // print_r($this->$arr[0]);
            $this->table_name = $table;
            $this->where = $arr;
            return $this->multi_where();
        }

        public function all($table, $limit="", $start="", $orderBy="", $orderType=""){

            $this->table_name = $table;
            $this->limit = $limit;
            $this->start = $start;
            $this->orderBy = $orderBy;
            $this->orderType = $orderType;

            return $this->get_all();

        }

        public function pub_update_where($table, $body, $arr){
            $this->table_name = $table;
            $this->body = $body;
            $this->where = $arr;

            return $this->update_where();
        }

        public function pub_delete_where($table, $arr){
            $this->table_name = $table;
            $this->where = $arr;

            return $this->delete_where();
        }

        public function customQuery($query){

		    $resp = $this->db->query($query);

            return $resp;

        }
    }

?>