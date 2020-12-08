<?php
    final class Faq extends Database{
        public function __construct(){
            parent::__construct();
            $this->table('faq');
        }

        public function getAllfaq(){
                  
            return $this->select();
        }


         public function addfaq($data){
            return $this->insert($data);
        }

        public function getfaqById($id)
        {
            $args = array(
                'where' => array(
                    'id' => $id
                )
            );

            return $this->select($args);
        }

        public function updatefaq($data, $Category_id){
            $args = array(
                'where' => array(
                    'id' => $Category_id
                )
            );
            $success = $this->update($data, $args);
            if($success){
                return $Category_id;
            } else {
                return false;
            }
        }

        public function deletefaq($id){
            $args = array(
                'where' => array(
                    'id' => $id
                )
            );
            return $this->delete($args);
        }
    }