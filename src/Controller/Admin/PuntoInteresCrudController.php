<?php

namespace App\Controller\Admin;

use App\Entity\PuntoInteres;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PuntoInteresCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PuntoInteres::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm()->hideOnIndex(),
            TextField::new('titulo', 'Título'),
            TextEditorField::new('descripcion', 'Descripción'),
            TextField::new('coordenadas', 'Coordenadas'),
            ImageField::new('foto', 'Imagen')
                ->setBasePath('images/uploads-ruta')
                ->setUploadDir('public/images/uploads-ruta')
                ->setUploadedFileNamePattern('[slug]-[timestamp].[extension]'),
            AssociationField::new('ruta', 'Ruta'),
            AssociationField::new('user', 'Usuario'),
            DateTimeField::new('fecha_publicacion', 'Fecha de publicación'),
        ];
    }

}
