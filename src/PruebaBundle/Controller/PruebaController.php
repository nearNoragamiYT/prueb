<?php
 namespace PruebaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

 class PruebaController extends Controller
 {
    public function index()
    {
        return new Response('Hola mundo')
    }
 }