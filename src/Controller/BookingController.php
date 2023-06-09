<?php

namespace App\Controller;

use App\Entity\Booking;
use App\Form\BookingType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/booking')]
class BookingController extends AbstractController
{
    private $em;
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    #[Route('/', name: 'app_booking')]
    public function index(Request $request): Response
    {
        // add an entity or model class
        $booking = new Booking();

        $form = $this->createForm(BookingType::class, $booking);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // TODO: Save in database

            $this->em->persist($booking);
            $this->em->flush();
        }

        return $this->render('booking/index.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('/confirm', name: 'app_booking_confirm')]
    public function confirm(): Response
    {
        return $this->render('booking/confirm.html.twig');
    }
}