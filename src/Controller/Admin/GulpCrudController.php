<?php

namespace App\Controller\Admin;

use App\Entity\Gulp;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class GulpCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Gulp::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),
            TextField::new('descriptif'),
            AssociationField::new('carte'),
            TextField::new('tarif'),
            BooleanField::new('actif'),
        ];
    }
}
