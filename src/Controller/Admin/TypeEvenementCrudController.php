<?php

namespace App\Controller\Admin;

use App\Entity\TypeEvenement;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TypeEvenementCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TypeEvenement::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('type'),
            TextField::new('descriptif'),
        ];
    }
}
