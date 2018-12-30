<?php

namespace App\Controller;

use App\Entity\Archer;
use App\Form\ArcherType;
use App\Repository\ArcherRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/archer")
 */
class ArcherController extends AbstractController
{
    /**
     * @Route("/", name="archer_index", methods="GET")
     */
    public function index(ArcherRepository $archerRepository): Response
    {
        return $this->render('archer/index.html.twig', ['current_menu' => 'archer', 'archers' => $archerRepository->findAll()]);
    }

    /**
     * @Route("/new", name="archer_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $archer = new Archer();
        $form = $this->createForm(ArcherType::class, $archer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($archer);
            $em->flush();

            return $this->redirectToRoute('archer_index');
        }

        return $this->render('archer/new.html.twig', [
            'current_menu' => 'archer', 
            'archer' => $archer,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="archer_show", methods="GET")
     */
    public function show(Archer $archer): Response
    {
        return $this->render('archer/show.html.twig', ['archer' => $archer]);
    }

    /**
     * @Route("/{id}/edit", name="archer_edit", methods="GET|POST")
     */
    public function edit(Request $request, Archer $archer): Response
    {
        $form = $this->createForm(ArcherType::class, $archer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('archer_edit', ['id' => $archer->getId()]);
        }

        return $this->render('archer/edit.html.twig', [
            'current_menu' => 'archer', 
            'archer' => $archer,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="archer_delete", methods="DELETE")
     */
    public function delete(Request $request, Archer $archer): Response
    {
        if ($this->isCsrfTokenValid('delete'.$archer->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($archer);
            $em->flush();
        }

        return $this->redirectToRoute('archer_index');
    }
}
