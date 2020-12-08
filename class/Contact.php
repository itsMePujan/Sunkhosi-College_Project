<?php
    final class Contact extends Database{
        public function __construct(){
            parent::__construct();
            $this->table('contact');
             }
        public function getallContact(){
          return $this->select($args);
            }
       
         public function addContact($data){
            return $this->insert($data);
        }
        public function getNS(){
            $args = array(
                'fields'=>'Count(*) as Count',
                'where' => array(
                    'is_seen' => 'N'
                )
            );
            return $this->select($args);
        }
        public function getAll(){
            $args = array(
                'where' => array(
                    'is_seen' => 'N'
                ),
                'limit' =>2
            );

          return $this->select($args);
        }
        public function unseen($data){
             $args = array(
                'where' => array(
                    'is_seen' => $data
                ),
            );

          return $this->select($args);
        }
         public function setseen($id,$data){
            $args = array(
                'where' => array(
                    'id' => $id
                )
            );

          return $this->update($data,$args);
        }
     
    }