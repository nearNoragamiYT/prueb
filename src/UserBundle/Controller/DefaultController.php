<?php

namespace UserBundle\Controller;

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
        return $this->render('UserBundle:Default:index.html.twig');
    }
    public function getUserAction(Int $id = 0)
    {
        $columns = ['id_users', 'id_product', 'email','name', 'active'];
        $condition = ['active' => 'true'];
        if ($id) $condition['id_users'] = $id;
        $response = $this->defaultModel->getUser('public', $columns, $condition);
        $message = 'No hay productos';
        $response['message'] = $response['data'] ? 'OK' : $message;

        
        return new JsonResponse($response);
    }

    public function addUsuarioAction(Request $request)
    {
        $params = $request->request->all();
        $values = [
            'id_product' => $params['idP'] ,  
            'email' => "'". $params['email'] . "'",
            'name' => "'". $params['name'] . "'",
            'active' => 'true'
        ];
        $response = $this->defaultModel->insertUsers('public',$values, 0);
        $message = 'No se inserto el producto';
        $response['message'] = $response['status'] ? 'OK' : $message;
        return new JsonResponse($response);
    }
    public function updateUserAction(Request $request)
    {
        $params = $request->request->all();
        $response = $this->defaultModel->updateUser($params);
        $message = 'No se actualizo el producto';
        $response['message'] = $response['status'] ? 'OK' : $message;
        return new JsonResponse($response);
    }

    public function eliminarUserAction(Request $request)
    {
        $params = $request->request->all();
        $response = $this->defaultModel->deleteUser($params);
        $message = 'No se elimino el producto';
        $response['message'] = $response['status'] ? 'OK' : $message;
        return new JsonResponse($response);
    }
}
