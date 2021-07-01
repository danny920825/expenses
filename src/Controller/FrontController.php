<?php

namespace App\Controller;

use App\Entity\Categorias;
use App\Entity\Operacion;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function index(): Response
    {

        //Obtener el Entity Manager
        $em = $this->getDoctrine()->getManager();

        //Obtener las Operaciones
        $operaciones = $em->getRepository(Operacion::class)->findAll();

        //Listar las categorias
        $cat = $em->getRepository(Categorias::class)->findAll();


        return $this->render('front/index.html.twig', [
            'controller_name' => 'FrontController',
            'operaciones' => $operaciones,
            'categorias'=>$cat,
        ]);
    }
}
