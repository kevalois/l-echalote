<?php

namespace App\Controller\Admin;

use App\Entity\Image;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ImageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Image::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle(Crud::PAGE_INDEX, 'Ajouter une image sur la page d\'accueil')
            // ->overrideTemplate('crud/index', '/admin/easyAdmin/custom/image_accueil.html.twig')
            ;
    }
    
    public function configureFields(string $pageName): iterable
    {
        $imageField = ImageField::new('imageFile')->setFormType(VichImageType::class)->setLabel('Image')
        ->setTemplatePath('admin/easyadmin/custom/image_accueil.html.twig');

        $image = ImageField::new('image')->setBasePath("/l-echalote/public/images/products")->setLabel('Image');

        $fields =  [
            TextField::new('titre')->onlyOnForms(),
            TextEditorField::new('descriptif')->onlyOnForms(),
            ImageField::new('imageFile')->setFormType(VichImageType::class)->setLabel('Image')->onlyOnForms(),
            BooleanField::new('actif'),
        ];

        if ($pageName === Crud::PAGE_INDEX || $pageName === Crud::PAGE_DETAIL) {
            $fields[] = $image;
        } else {
            $fields[] = $imageField;
        }
        
        return $fields;
    }
}
