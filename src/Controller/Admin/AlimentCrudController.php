<?php

namespace App\Controller\Admin;

use App\Entity\Aliment;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AlimentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Aliment::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('type_aliment'),
        ];
    }
    
}
