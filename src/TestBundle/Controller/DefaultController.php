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
            'name' => "'". $params['nameP'] . "'",
            'active' => 'true'
        ];
        $response = $this->defaultModel->insertProduct('public',$values, 0);
        $message = 'No se inserto el producto';
        $response['message'] = $response['status'] ? 'OK' : $message;
        return new JsonResponse($response);
    }






}
