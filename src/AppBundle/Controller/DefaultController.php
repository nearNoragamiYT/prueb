<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/home/{name}", name="homepage")
     */
    public function indexAction($name)
    {
        $parametro = [
            'Name' => $name
        ];
        return $this->render('default/index.html.twig', $parametro);
    }

    /**
     * @Route("/jsonresponse", name="welcome")
     */
    public function HomeAction(Request $request)
    {
        $parametro = [
            'Name' => 'Miguel Angel',
            'age' => 25,
            'color' => 'blue'
        ];
        return new JsonResponse($parametro);
    }

    /**
     * @Route("/response", name="response")
     */
    public function Home_Action(Request $request)
    {
        $parametro = [
            'Name' => 'Miguel Angel',
            'age' => 25,
            'color' => 'blue'
        ];
        return new Response($parametro['Name']);
    }
}
