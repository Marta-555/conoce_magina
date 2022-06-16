<?php

namespace App\Controller\Admin;

use App\Entity\ActividadOcio;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;

class ActividadOcioCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ActividadOcio::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm()->hideOnIndex(),
            TextField::new('nombre', 'Nombre'),
            TextareaField::new('descripcion', 'Descripción'),
            NumberField::new('precio', 'Precio (persona)'),
            ImageField::new('image', 'Imagen')
                ->setBasePath('images/uploads-actOcio')
                ->setUploadDir('public/images/uploads-actOcio')
                ->setUploadedFileNamePattern('[slug]-[timestamp].[extension]'),
            AssociationField::new('empresa', 'Empresa'),
            AssociationField::new('municipio', 'Municipio')
        ];
    }

}
