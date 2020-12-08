<?php
    final class About extends Database{
        public function __construct(){
            parent::__construct();
            $this->table('about');
        }

        public function getbyid($id)
        {
            $args = array(
                'where' => array(
                    'id' => $id
                )
            );

            return $this->select($args);
        }
        public function updatebyid($data, $id){
            $args = array(
                'where' => array(
                    'id' => $id
                )
            );
            $success = $this->update($data, $args);
            if($success){
                return $id;
            } else {
                return false;
            }
        }
    }