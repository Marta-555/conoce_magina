<?php

namespace App\Controller\Admin;

use App\Entity\Pub;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PubCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Pub::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm()->hideOnIndex(),
            TextField::new('nombre', 'Nombre'),
            TextField::new('direccion', 'Dirección'),
            NumberField::new('telefono_1', 'Teléfono 1'),
            NumberField::new('telefono_2', 'Teléfono 2'),
            TextField::new('pagina_web', 'Web'),
            ImageField::new('image', 'Imagen')
                ->setBasePath('images/uploads-pub')
                ->setUploadDir('public/images/uploads-pub')
                ->setUploadedFileNamePattern('[slug]-[timestamp].[extension]'),
            AssociationField::new('categoria', 'Servicio'),
            AssociationField::new('poblacion', 'Población')
        ];
    }

}
