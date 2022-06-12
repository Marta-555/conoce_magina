<?php

namespace App\Controller\Admin;

use App\Entity\Restaurante;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;

class RestauranteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Restaurante::class;
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
                ->setBasePath('images/uploads')
                ->setUploadDir('public/images/uploads')
                ->setUploadedFileNamePattern('[slug]-[timestamp].[extension]'),
            AssociationField::new('categoria', 'Servicio'),
            AssociationField::new('municipio', 'Municipio')
        ];
    }

}
