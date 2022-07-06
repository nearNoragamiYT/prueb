<?php

namespace TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('TestBundle:Default:index.html.twig');
    }
    public function formularioAction()
    {
        return $this->render('TestBundle:Default:formulario.html.twig');
    }
    public function formularioProductosAction()
    {
        return $this->render('TestBundle:Default:formularioProductos.html.twig');
    }
}
