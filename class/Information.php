<?php
    final class Information extends Database{
        public function __construct(){
            parent::__construct();
            $this->table('info_org_ind');
        }

          public function addInformation($data){
            return $this->insert($data);
        }
        public function UpdateInformation($data,$info_id){
            $args = array(
                'where' => array(
                    'id' => $info_id
                )
            );
            $success = $this->update($data, $args);
            if($success){
                return $info_id;
            } else {
                return false;
            }
        }
        public function validid($id){
            $args = array(
                'where' => array(
                    'id' => $id
                )
            );

            return $this->select($args);
        }
        public function getallinformation($id){
         $args = array(
             'where' => array(
                 'Id' => $id
                )
            );
            return $this->select($args);
        }
         public function getInfo(){

            return $this->select();
        }

        public function DeleteDataById($id){
                $args = array(
                'where' => array(
                    'id' => $id
                )
            );
            return $this->delete($args);
        }
    }