<?php

namespace TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    private $defaultModel;

    public function __construct()
    {
        $this->defaultModel = new DefaultModel();
    }
    public function indexAction()
    {
        return $this->render('TestBundle:Default:index.html.twig');
    }

    public function getProductsAction(Int $id = 0)
    {
        $columns = ['id_product', 'name', 'active'];
        $condition = ['active' => 'true'];
        if ($id) $condition['id_product'] = $id;
        $response = $this->defaultModel->getProductsOrProduct('public', $columns, $condition);
        $message = 'No hay productos';
        $response['message'] = $response['data'] ? 'OK' : $message;
        return new JsonResponse($response);
    }

    public function addProductAction(Request $request)
    {
        $params = $request->request->all();
        $values = [
            'name' => "'" . $params['nameP'] . "'",
            'active' => 'true'
        ];
        $response = $this->defaultModel->insertProduct('public', $values, 0);
        $message = 'No se inserto el producto';
        $response['message'] = $response['status'] ? 'OK' : $message;
        return new JsonResponse($response);
    }

    public function updateProductAction(Request $request)
    {
        $params = $request->request->all();
        $response = $this->defaultModel->updateProduct($params);
        $message = 'No se actualizo el producto';
        $response['message'] = $response['status'] ? 'OK' : $message;
        return new JsonResponse($response);
    }

    public function deleteProductAction(Request $request)
    {
        $params = $request->request->all();
        $response = $this->defaultModel->deleteProduct($params);
        $message = "No se pudo eliminar";
        $response['message'] = $response['status'] ? 'se elimino con exito' : $message;
        return new JsonResponse($response);
    }








    public function getUserAction(Int $id = 0)
    {
        $columns = ['id_user', 'name', 'active'];
        $condition = ['active' => 'true'];
        if ($id) $condition['id_user'] = $id;
        $response = $this->defaultModel->getUsersOrUser('public', $columns, $condition);
        $message = 'No hay usuarios';
        $response['message'] = $response['data'] ? 'OK' : $message;
        return new JsonResponse($response);
    }

    public function addUserAction(Request $request)
    {
        $params = $request->request->all();
        $values = [
            'name' => "'" . $params['nameU'] . "'",
            'active' => 'true'
        ];
        $response = $this->defaultModel->insertUser('public', $values, 0);
        $message = 'No se inserto el usuario';
        $response['message'] = $response['status'] ? 'OK' : $message;
        return new JsonResponse($response);
    }

    public function updateUsertAction(Request $request)
    {
        $params = $request->request->all();
        $response = $this->defaultModel->updateUser($params);
        $message = 'No se actualizo el usuario';
        $response['message'] = $response['status'] ? 'OK' : $message;
        return new JsonResponse($response);
    }
    public function deleteUserAction(Request $request)
    {
        $params = $request->request->all();
        $response = $this->defaultModel->deleteUser($params);
        $message = "No se pudo eliminar";
        $response['message'] = $response['status'] ? 'se elimino con exito' : $message;
        return new JsonResponse($response);
    }

}
