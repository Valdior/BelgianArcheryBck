<?php

namespace App\Controller;

use App\Entity\Club;
use App\Form\ClubType;
use App\Form\ClubSearchType;
use App\Repository\ClubRepository;
use App\Repository\RegionRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @Route("/club")
 */
class ClubController extends Controller
{
    /**
     * @Route("/", name="club_index", methods="GET|POST")
     */
    public function index(ClubRepository $clubRepository, RegionRepository $regionRepository, Request $request): Response
    {
        $club = new Club();
        $clubs = null;
        $form = $this->createForm(ClubSearchType::class, $club);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {           
            $clubs = $clubRepository->findBy(['region' => $club->getRegion()], array('number' => 'ASC'));
        }

        return $this->render('club/index.html.twig', ['current_menu' => 'club', 'clubs' => $clubs, 'form' => $form->createView()]);
    }

    /**
     * @Route("/new", name="club_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $club = new Club();
        $form = $this->createForm(ClubType::class, $club);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($club);
            $em->flush();

            return $this->redirectToRoute('club_index');
        }

        return $this->render('club/new.html.twig', [
            'current_menu' => 'club', 
            'club' => $club,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="club_show", methods="GET")
     */
    public function show(Club $club): Response
    {
        return $this->render('club/show.html.twig', ['current_menu' => 'club', 'club' => $club]);
    }

    /**
     * @Route("/{id}/edit", name="club_edit", methods="GET|POST")
     */
    public function edit(Request $request, Club $club): Response
    {
        $form = $this->createForm(ClubType::class, $club);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('club_edit', ['id' => $club->getId()]);
        }

        return $this->render('club/edit.html.twig', [
            'current_menu' => 'club', 
            'club' => $club,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="club_delete", methods="DELETE")
     */
    public function delete(Request $request, Club $club): Response
    {
        if ($this->isCsrfTokenValid('delete'.$club->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($club);
            $em->flush();
        }

        return $this->redirectToRoute('club_index');
    }
}
