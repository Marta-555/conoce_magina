<?php

namespace App\Controller\Admin;

use App\Entity\Poblacion;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;

class PoblacionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Poblacion::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('nombre', 'Nombre'),
            NumberField::new('codigo_postal', 'Código Postal'),
            NumberField::new('habitantes', 'Habitantes'),
            AssociationField::new('municipio')
        ];
    }

}
