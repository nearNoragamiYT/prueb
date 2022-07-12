<?php

namespace UserBundle\Controller;

use Utilerias\SQLBundle\Model\SQLModel;

class DefaultModel extends SQLModel
{
     /**
     * get all products or one product
     * @return Array ['status', 'data']
     */
    public function getUser(String $schema, Array $columns, Array $condition, Array $order = [])
    {
        $this->setSchema($schema);
        return $this->selectFromTable('users',$columns, $condition, $order);
    }

    /**
     * insert product.
     * @return Array ['status', 'data']
     */
    public function insertUsers(String $schema, Array $values, Int $id)
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
        $query .= ' SET "id_product"=' . "'" . $params['idP']."' ,";
        $query .= ' "email"=' . "'" . $params['email']."' ,";
        $query .= ' "name"=' . "'" . $params['name']."' ,";
        $query .= ' "active"=' . "'" . $params['active']."' ";
        $query .= ' WHERE "id_users"=' . $params['id'];
        return $this->executeQuery($query);
    }
    public function deleteUser(array $params)
    {
        $query = 'DELETE FROM';
        $query .= ' "public"."users"';
        // $query .= ' SET "name"=' . "'" . $params['name']."'";
        $query .= ' WHERE "id_users"=' . $params['id'];
        return $this->executeQuery($query);
    }
}