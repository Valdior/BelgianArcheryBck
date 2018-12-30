<?php

namespace App\Controller;

use App\Entity\Peloton;
use App\Form\PelotonType;
use App\Entity\Participant;
use App\Form\ParticipantType;
use App\Entity\Tournament;
use App\Repository\PelotonRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/tournament/{tournament}/peloton")
 */
class PelotonController extends AbstractController
{
    /**
     * @Route("/new", name="peloton_new", methods="GET|POST")
     */
    public function new(Tournament $tournament, Request $request): Response
    {
        $peloton = new Peloton();
        $form = $this->createForm(PelotonType::class, $peloton);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $peloton->setTournament($tournament);
            $em = $this->getDoctrine()->getManager();
            $em->persist($peloton);
            $em->flush();

            return $this->redirectToRoute('tournament_show', ['id' => $tournament->getId()]);
        }

        return $this->render('peloton/new.html.twig', [
            'peloton' => $peloton,
            'tournament' => $tournament,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="peloton_show", methods="GET")
     */
    public function show(Peloton $peloton): Response
    {
        return $this->render('peloton/show.html.twig', ['peloton' => $peloton]);
    }

    /**
     * @Route("/{id}/edit", name="peloton_edit", methods="GET|POST")
     */
    public function edit(Request $request, Tournament $tournament, Peloton $peloton): Response
    {
        $form = $this->createForm(PelotonType::class, $peloton);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('peloton_edit', ['tournament' => $tournament->getId(),'id' => $peloton->getId()]);
        }

        return $this->render('peloton/edit.html.twig', [
            'peloton' => $peloton,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="peloton_delete", methods="DELETE")
     */
    public function delete(Request $request, Tournament $tournament, Peloton $peloton): Response
    {
        if ($this->isCsrfTokenValid('delete'.$peloton->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($peloton);
            $em->flush();
        }

        return $this->redirectToRoute('tournament_show', ['id' => $tournament->getId()]);
    }

    /**
     * @Route("/{id}/register", name="peloton_register", methods="GET|POST")
     */
    public function register(Tournament $tournament, Peloton $peloton, Request $request): Response
    {
        $participant = new Participant();
        $form = $this->createForm(ParticipantType::class, $participant, array('user' => $this->getUser()));
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $participant->setPeloton($peloton);

            if(!in_array('ROLE_ADMIN', $this->getUser()->getRoles()))
                $participant->setArcher($this->getUser()->getArcher());

            $em = $this->getDoctrine()->getManager();
            $em->persist($participant);
            $em->flush();

            return $this->redirectToRoute('tournament_show', ['id' => $tournament->getId()]);
        }

        return $this->render('participant/register.html.twig', [
            'participant' => $participant,
            'peloton' => $peloton,
            'tournament' => $tournament,
            'form' => $form->createView(),
        ]);
    }
}
