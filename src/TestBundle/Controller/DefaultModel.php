<?php

namespace TestBundle\Controller;

use Utilerias\SQLBundle\Model\SQLModel;

class DefaultModel extends SQLModel
{
     /**
     * get all products or one product
     * @return Array ['status', 'data']
     */
    public function getProductsOrProduct(String $schema, Array $columns, Array $condition, Array $order = [])
    {
        $this->setSchema($schema);
        return $this->selectFromTable('products',$columns, $condition, $order);
    }

    /**
     * insert product.
     * @return Array ['status', 'data']
     */
    public function insertProduct(String $schema, Array $values, Int $id)
    {
        $this->setSchema($schema);
        $response = $this->insertIntoTable('products',$values, $id);
        return $response;
    }

 dev_yulissa
     /**



    /**
     * delete product.
     * @return Array ['status', 'data']
     */
    public function deleteProduct(String $schema, Array $values, Int $id)
    {
        $this->setSchema($schema);

        
        $response = $this->insertIntoTable('products',$values, $id);
        return $response;
    }
}


     * $params ['id' => 'value', 'name' => 'value']]
     * @return Array ['status', 'data']
     */
    public function updateProduct(array $params)
    {
        $query = 'UPDATE';
        $query .= ' "public"."products"';
        $query .= ' SET "name"=' . "'" . $params['name']."'";
        $query .= ' WHERE "id_product"=' . $params['id'];
        return $this->executeQuery($query);
    }

     /**
     * $params ['id' => 'value', 'name' => 'value']]
     * @return Array ['status', 'data']
     */
    public function deleteProduct(array $params)
    {
        $query = 'DELETE FROM';
        $query .= ' "public"."products"';
        $query .= ' WHERE "id_product"=' . $params['id'];
        return $this->executeQuery($query); 
    }


     /**
     * get all users or one product
     * @return Array ['status', 'data']
     */
    public function getUsersOrUser(String $schema, Array $columns, Array $condition, Array $order = [])
    {
        $this->setSchema($schema);
        return $this->selectFromTable('users',$columns, $condition, $order);
    }

    /**
     * insert product.
     * @return Array ['status', 'data']
     */
    public function insertUser(String $schema, Array $values, Int $id)
    {
        $this->setSchema($schema);
        $response = $this->insertIntoTable('users',$values, $id);
        return $response;
    }

     /**
     * $params ['id' => 'value', 'name' => 'value']]
     * @return Array ['status', 'data']
     */
    public function updateUser(array $params)
    {
        $query = 'UPDATE';
        $query .= ' "public"."users"';
        $query .= ' SET "name"=' . "'" . $params['name']."'";
        $query .= ' WHERE "id_user"=' . $params['id'];
        return $this->executeQuery($query);
    }

    /**
     * $params ['id' => 'value', 'name' => 'value']]
     * @return Array ['status', 'data']
     */
    public function deleteUser(array $params)
    {
        $query = 'DELETE FROM';
        $query .= ' "public"."users"';
        $query .= ' WHERE "id_user"=' . $params['id'];
        return $this->executeQuery($query); 
    }
}
    


   


}