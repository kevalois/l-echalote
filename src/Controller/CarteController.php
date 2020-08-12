<?php

namespace App\Controller;

use App\Entity\Gulp;
use App\Entity\Carte;
use App\Entity\Aliment;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CarteController extends AbstractController
{
    /**
     * @Route("/carte", name="carte")
     */
    public function index()
    {
        $gulp = $this->getDoctrine()->getRepository(Gulp::class)->findBy([
            'actif' => 1
        ]);
        //dump($gulp);

        $manger = $this->getDoctrine()->getRepository(Carte::class)->findBy([
            'aliments' => 1,
            'actif' => 1
        ]);
        //dump($manger);
        
        $boire = $this->getDoctrine()->getRepository(Carte::class)->findBy([
            'aliments' => 2,
            'actif' => 1
        ]);
        //dd($boire);

        $categorie = $this->getDoctrine()->getRepository(Carte::class)->findBy([
            'actif' => 1
        ]);
        //dd($categorie);



        

        return $this->render('accueil/carte.html.twig', [
            'gulps' => $gulp,
            'boires' => $boire,
            'mangers' => $manger,
            'categories' => $categorie,
        ]);
    }
}
