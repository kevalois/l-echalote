<?php

namespace App\Controller\Admin;

use App\Entity\Gulp;
use App\Entity\Carte;
use App\Entity\Image;
use App\Entity\Alerte;
use App\Entity\Aliment;
use App\Entity\Evenement;
use App\Entity\PlatDuJour;
use App\Entity\TypeEvenement;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\Admin\PlatDuJourCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        // redirect to some CRUD controller
        $routeBuilder = $this->get(CrudUrlGenerator::class)->build();

        return $this->render('admin/easyAdmin/welcome.html.twig');
        //return $this->redirect($routeBuilder->setController(PlatDuJourCrudController::class)->generateUrl());
        
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Tableau de bord Echalote');
    }

    public function configureMenuItems(): iterable
    {
        //yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::section('Accueil');
        yield MenuItem::linkToCrud('Plat du jour', 'far fa-calendar', PlatDuJour::class);
        yield MenuItem::linkToCrud('Alerte', 'fas fa-exclamation-triangle', Alerte::class);
        yield MenuItem::linkToCrud('Type évenement', 'fas fa-glass-cheers', TypeEvenement::class);
        yield MenuItem::linkToCrud('Evenement', 'far fa-calendar-alt', Evenement::class);
        yield MenuItem::section('La Carte');
        yield MenuItem::linkToCrud('Carte', 'fas fa-book-open', Carte::class);
        yield MenuItem::linkToCrud('Plat/Boisson', 'fas fa-carrot', Gulp::class);
        yield MenuItem::linkToCrud('Aliment', 'fa fa-user', Aliment::class);
        yield MenuItem::section('Photos');
        yield MenuItem::linkToCrud('Photos Accueil', 'far fa-image', Image::class);
    }
}
