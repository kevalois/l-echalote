<?php

namespace App\Controller;

use App\Entity\Alerte;
use App\Entity\Evenement;
use App\Entity\PlatDuJour;
use Doctrine\ORM\Mapping\OrderBy;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AccueilController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function accueil()
    {
        $platDuJour = $this->getDoctrine()->getRepository(PlatDuJour::class)->findBy([
            'actif' => 1
        ]);

        $alertes = $this->getDoctrine()->getRepository(Alerte::class)->findBy([
            'actif' => 1
        ]);

        $evenement = $this->getDoctrine()->getRepository(Evenement::class)->findByEvents();

        return $this->render('accueil/accueil.html.twig', [
            'platDuJour' => $platDuJour,
            'alertes' => $alertes,
            'evenements' => $evenement,
        ]);
    }

}
