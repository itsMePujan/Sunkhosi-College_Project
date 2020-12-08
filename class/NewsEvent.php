<?php
    final class NewsEvent extends Database{
        public function __construct(){
            parent::__construct();
            $this->table('newsandevents');
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
        public function getAllperosnalinfo(){
            return $this->select();
        }
        public function getallinformation($id){
         $args = array(
             'where' => array(
                 'Id' => $id
                )
            );
            return $this->select($args);
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