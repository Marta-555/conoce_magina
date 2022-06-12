<?php

namespace App\Controller\Admin;

use App\Entity\VisitaGuiada;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class VisitaGuiadaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return VisitaGuiada::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm()->hideOnIndex(),
            TextField::new('nombre', 'Nombre'),
            TextareaField::new('descripcion', 'Descripción'),
            IntegerField::new('precio', 'Precio (persona)'),
            ImageField::new('image', 'Imagen')
                ->setBasePath('images/uploads-actOcio')
                ->setUploadDir('public/images/uploads-actOcio')
                ->setUploadedFileNamePattern('[slug]-[timestamp].[extension]'),
            AssociationField::new('empresa', 'Empresa'),
            AssociationField::new('municipio', 'Municipio')
        ];
    }

}
