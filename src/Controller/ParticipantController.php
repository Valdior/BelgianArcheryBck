<?php

namespace App\Controller;

use App\Entity\Tournament;
use App\Entity\Participant;
use App\Form\ParticipantType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/tournament/{tournament}/participant")
 */
class ParticipantController extends AbstractController
{
    /**
     * @Route("/{id}/edit", name="participant_edit")
     */
    public function edit(Request $request, Tournament $tournament, Participant $participant)
    {
        $form = $this->createForm(ParticipantType::class, $participant, array('user' => $this->getUser()));
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tournament_show', ['id' => $tournament->getId()]);
        }

        return $this->render('participant/edit.html.twig', [
            'participant' => $participant,
            'tournament' => $tournament,
            'form' => $form->createView(),
        ]);
    }
}
 