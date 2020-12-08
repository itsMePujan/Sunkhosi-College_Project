<?php
    final class User extends Database{
        public function __construct(){
            parent::__construct();
            $this->table('user_info');
        }

            public function getAllUser(){
                  return $this->select();
            }
        public function getUserByUserName($email){
            // SELECT * FROM users WHERE email = $email
            // SELECT * FROM users WHERE remeber_token = $token
            // SELECT * FROM users WHERE id = $id
            // SELECT * FROM users
            $args = array(
                // 'fields' => 'id, name, status, password, email'
                // 'fields' => ['id', 'name', 'status', 'password', 'email']
                'where' => array(
                    'email' => $email
                )
            );

            return $this->select($args);
        }
          public function addUser($data){
            return $this->insert($data);
        }


        public function getUserById($id)
        {
            $args = array(
                'where' => array(
                    'id' => $id
                )
            );

            return $this->select($args);
        }
         public function getUserByPhone($id)
        {
            $args = array(
                'where' => array(
                    'phone_number' => $id
                )
            );

            return $this->select($args);
        }

        public function updateUser($data, $user_id){
            $args = array(
                'where' => array(
                    'id' => $user_id
                )
            );
            $success = $this->update($data, $args);
            if($success){
                return $user_id;
            } else {
                return false;
            }
        }
        public function updateUserbyUsername($data, $email){
            $args = array(
                'where' => array(
                    'email' => $email
                )
            );
            $success = $this->update($data, $args);
            if($success){
                return $user_id;
            } else {
                return false;
            }
        }

        public function getUserByToken($token){
            $args = array(
                'where' => array(
                    'remember_token' => $token
                )
            );
            return $this->select($args);
        }

        public function getUserByRecoveryToken($token){
            $args = array(
                'where' => array(
                    'recovery_token' => $token
                )
            );
            return $this->select($args);
        }


        public function getAllReporter(){
            // SELECT * FROM users WHERE role = 'reporter'
            $args = array(
                'where' => array('role'=>'reporter'),
                'order_by' => ' name ASC'
            );
            return $this->select($args);
        }
    }
