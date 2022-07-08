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

    /**
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
}