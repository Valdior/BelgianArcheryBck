<?php

namespace App\Controller;

use App\Entity\Tournament;
use App\Entity\Participant;
use App\Form\TournamentType;
use App\Repository\TournamentRepository;
use App\Repository\ParticipantRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @Route("/tournament")
 */
class TournamentController extends Controller
{
    /**
     * @Route("/", name="tournament_index", methods="GET")
     */
    public function index(TournamentRepository $tournamentRepository): Response
    {
        return $this->render('tournament/index.html.twig', ['current_menu' => 'tournament', 'tournaments' => $tournamentRepository->findBy(array(), array('startDate' => 'ASC'))]);
    }

    /**
     * @Route("/new", name="tournament_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $tournament = new Tournament();
        $form = $this->createForm(TournamentType::class, $tournament);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tournament);
            $em->flush();

            return $this->redirectToRoute('tournament_index');
        }

        return $this->render('tournament/new.html.twig', [
            'current_menu' => 'tournament', 
            'tournament' => $tournament,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tournament_show", methods="GET")
     */
    public function show(Tournament $tournament): Response
    {
        return $this->render('tournament/show.html.twig', ['current_menu' => 'tournament', 'tournament' => $tournament]);
    }

    /**
     * @Route("/{id}/edit", name="tournament_edit", methods="GET|POST")
     */
    public function edit(Request $request, Tournament $tournament): Response
    {
        $form = $this->createForm(TournamentType::class, $tournament);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tournament_edit', ['id' => $tournament->getId()]);
        }

        return $this->render('tournament/edit.html.twig', [
            'current_menu' => 'tournament', 
            'tournament' => $tournament,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tournament_delete", methods="DELETE")
     */
    public function delete(Request $request, Tournament $tournament): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tournament->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tournament);
            $em->flush();
        }

        return $this->redirectToRoute('tournament_index');
    }

    /**
     * @Route("/{id}/ranking", name="tournament_ranking", methods="GET")
     */
    public function ranking(Tournament $tournament)
    {
        $participants = $this->getDoctrine()
            ->getRepository(Participant::class)
            ->ranking($tournament->getId());
        return $this->render('tournament/ranking.html.twig', ['participants' => $participants]);
    }
}
