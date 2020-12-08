<?php
    final class Gallery extends Database{
        public function __construct(){
            parent::__construct();
            $this->table('gallery');
        }

        public function AddImage($data){
            return $this->insert($data);
        }
        public function getAllimage(){
            
                  return $this->select();
            }
        public function UpdateImage($data,$info_id){
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
        public function DeleteImageById($id){
                $args = array(
                'where' => array(
                    'id' => $id
                )
            );
            return $this->delete($args);
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
        public function getBanner($name){
         $args = array(
             'where' => array(
                 'banner' => $name
                ),
             'order_by'=> 'id Asc'
            );
         return $this->select($args);
        }
    }