<?php

namespace App\Controller;

use App\Entity\Categorias;
use App\Form\CategoriasType;
use App\Repository\CategoriasRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/categorias")
 */
class CategoriasController extends AbstractController
{
    /**
     * @Route("/", name="categorias_index", methods={"GET"})
     */
    public function index(CategoriasRepository $categoriasRepository): Response
    {
        return $this->render('front/categorias/index.html.twig', [
            'categorias' => $categoriasRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="categorias_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $categoria = new Categorias();
        $form = $this->createForm(CategoriasType::class, $categoria);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($categoria);
            $entityManager->flush();

            return $this->redirectToRoute('categorias_new');
        }

        return $this->render('front/categorias/new.html.twig', [
            'categoria' => $categoria,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="categorias_show", methods={"GET"})
     */
    public function show(Categorias $categoria): Response
    {
        return $this->render('categorias/show.html.twig', [
            'categoria' => $categoria,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="categorias_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Categorias $categoria): Response
    {
        $form = $this->createForm(CategoriasType::class, $categoria);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('categorias_index');
        }

        return $this->render('front/categorias/edit.html.twig', [
            'categoria' => $categoria,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/delete", name="categorias_delete", methods={"GET"})
     */
    public function delete(Request $request, Categorias $categoria): Response
    {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($categoria);
            $entityManager->flush();


        return $this->redirectToRoute('categorias_index');
    }
}
