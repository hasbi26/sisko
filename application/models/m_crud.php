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
        private $value;

        private $spname;
        private $username;
        private $password;

        private function multi_where(){
            $this->db->where($this->where);
            $query = $this->db->get($this->table_name);
            // print_r($this->db->last_query());
            // exit;

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
            return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
            
            // return $update;
        }
        
        private function insert(){
            return $this->db->insert($this->table_name, $this->value);
            // print_r($this->db->last_query());
            // exit;
        }

        private function call_sp(){

            $query = $this->db->query("CALL $this->spname('{$this->username}', '{$this->password}')");
            return $query;
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

        public function pub_insert($table, $value){
            $this->table_name = $table;
            $this->value = $value;
            return $this->insert();
        }

        public function customQuery($select, $table, $join, $where, $orderby ="", $ordertype = "", $limit="", $start=""){

            $this->db->select($select);
            $this->db->from($table.' A');

            foreach ($join as $key => $value) {
                # code...
                $this->db->join($key, $value);
            }

            $this->db->where($where);

            if($orderby !== "" && $ordertype !== ""){
                $this->db->order_by($orderby, $ordertype);
            }

            if($limit !== "" && $start !== ""){
                $this->db->limit($limit, $start);
            }

            $resp = $this->db->get();

            // print_r($this->db->last_query());
            // exit;

            return $resp;

        }

        public function pub_call_sp($spname, $username, $password){
            $this->spname = $spname;
            $this->username = $username;
            $this->password = $password;
            return $this->call_sp();
        }
    }

?>