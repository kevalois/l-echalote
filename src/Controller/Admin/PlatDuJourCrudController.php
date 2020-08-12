<?php

namespace App\Controller\Admin;

use App\Entity\PlatDuJour;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PlatDuJourCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PlatDuJour::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextEditorField::new('plat'),
            DateTimeField::new('date'),
            BooleanField::new('actif'),
        ];
    }
}
