<?php

namespace App\EventListener;

use App\Entity\Tournament;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Toiba\FullCalendarBundle\Entity\Event;
use Toiba\FullCalendarBundle\Event\CalendarEvent;

class FullCalendarListener
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @var UrlGeneratorInterface
     */
    private $router;

    public function __construct(EntityManagerInterface $em, UrlGeneratorInterface $router)
    {
        $this->em = $em;
        $this->router = $router;
    }

    public function loadEvents(CalendarEvent $calendar)
    {
        $startDate = $calendar->getStart();
        $endDate = $calendar->getEnd();
        $filters = $calendar->getFilters();

        // Modify the query to fit to your entity and needs
        // Change b.startDate by your start date in your custom entity
        $tournaments = $this->em->getRepository(Tournament::class)
            ->createQueryBuilder('b')
            ->andWhere('b.startDate BETWEEN :startDate and :endDate')
            ->setParameter('startDate', $startDate->format('Y-m-d'))
            ->setParameter('endDate', $endDate->format('Y-m-d'))
            ->getQuery()->getResult();

        foreach($tournaments as $tournament) {

            $date = $tournament->getEndDate();            
            $date->modify('+1 day');
            $tournament->setEndDate($date);
            // this create the events with your own entity (here tournament entity) to populate calendar
            $tournamentEvent = new Event(
                $tournament->getId(),
                $tournament->getStartDate(),
                $tournament->getEndDate() // If the end date is null or not defined, it creates a all day event
            );

            /*
             * Optional calendar event settings
             *
             * For more information see : Toiba\FullCalendarBundle\Entity\Event
             * and : https://fullcalendar.io/docs/event-object
             */
            // $tournamentEvent->setUrl('http://www.google.com');
            // $tournamentEvent->setBackgroundColor($tournament->getColor());
            // $tournamentEvent->setCustomField('borderColor', $tournament->getColor());
            $tournamentEvent->setUrl(
                $this->router->generate('tournament_show', array(
                    'id' => $tournament->getId(),
                ))
            );

            // finally, add the tournament to the CalendarEvent for displaying on the calendar
            $calendar->addEvent($tournamentEvent);
        }
    }
}