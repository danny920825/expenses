<?php

namespace App\Controller;

use App\Entity\Operacion;
use App\Form\OperacionType;
use App\Repository\OperacionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/operacion")
 */
class OperacionController extends AbstractController
{
    /**
     * @Route("/", name="operacion_index", methods={"GET"})
     */
    public function index(OperacionRepository $operacionRepository): Response
    {
        return $this->render('front/operacion/index.html.twig', [
            'operacions' => $operacionRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="operacion_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $operacion = new Operacion();
        $form = $this->createForm(OperacionType::class, $operacion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($operacion);
            $entityManager->flush();

            return $this->redirectToRoute('operacion_new');
        }

        return $this->render('front/operacion/new.html.twig', [
            'operacion' => $operacion,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="operacion_show", methods={"GET"})
     */
    public function show(Operacion $operacion): Response
    {
        return $this->render('front/operacion/show.html.twig', [
            'operacion' => $operacion,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="operacion_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Operacion $operacion): Response
    {
        $form = $this->createForm(OperacionType::class, $operacion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('operacion_index');
        }

        return $this->render('front/operacion/edit.html.twig', [
            'operacion' => $operacion,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/delete", name="operacion_delete", methods={"GET"})
     */
    public function delete(Request $request, Operacion $operacion): Response
    {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($operacion);
            $entityManager->flush();


        return $this->redirectToRoute('operacion_index');
    }
}
