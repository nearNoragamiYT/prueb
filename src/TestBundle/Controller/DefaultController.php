<?php

namespace TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('TestBundle:Default:index.html.twig');
    }

public function getProductsAction(Request $request, Int $id = 0)
    {
        $columns = ['id_product', 'name', 'active'];
        $condition = ['active' => 'true'];
        if ($id) $condition['id_product'] = $id;
        $response = $this->defaultModel->getProductsOrProduct('public', $columns, $condition);
        return new JsonResponse($response);
    }
}
