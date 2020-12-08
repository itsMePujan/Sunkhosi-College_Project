<?php
    final class Category extends Database{
        public function __construct(){
            parent::__construct();
            $this->table('category');
        }

            public function getAllCategory(){
            $args = array(
                'where' => array(
                    'is_main' => '1'
                )
            );
                  return $this->select($args);
            }
        public function getCategoryByCategoryName($category_name){
            // SELECT * FROM Categorys WHERE email = $email
            // SELECT * FROM Categorys WHERE remeber_token = $token
            // SELECT * FROM Categorys WHERE id = $id
            // SELECT * FROM Categorys
            $args = array(
                // 'fields' => 'id, name, status, password, email'
                // 'fields' => ['id', 'name', 'status', 'password', 'email']
                'where' => array(
                    'category_name' => $category_name
                )
            );

            return $this->select($args);
        }
        public function getAllsub(){
            $args = array(
                'where' => 'is_main is null'
            );

            return $this->select($args);
        }

         public function addCategory($data){
            return $this->insert($data);
        }

        public function getCategoryById($id)
        {
            $args = array(
                'where' => array(
                    'id' => $id
                )
            );

            return $this->select($args);
        }
        public function getChildCatsById($parent_id){
            $args = array(
                'where' => array(
                    'is_sub' => $parent_id
                )
            );
            return $this->select($args);
        }
        public function getparentCatsById($child_sub_id){ //is_sub_id  
            $args = array(
                'where' => array(
                    'id' => $child_sub_id
                )
            );
            return $this->select($args);
        }



        public function getMaincat($id)
        {
            $args = array(
                'where' => array(
                    'is_main' => $id
                    
                )
            );
            return $this->select($args);
        }

        public function updateCategory($data, $Category_id){
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

        public function deleteCategory($id){
            $args = array(
                'where' => array(
                    'id' => $id
                )
            );

            return $this->delete($args);
        }
    }