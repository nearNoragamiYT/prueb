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
}
