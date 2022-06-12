<?php

namespace App\Controller\Admin;

use App\Entity\Municipio;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;

class MunicipioCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Municipio::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('nombre', 'Nombre'),
            NumberField::new('habitantes', 'Habitantes'),
            NumberField::new('altitud', 'Altitud (msnm)'),
            NumberField::new('superficie', 'Superficie (km²)'),
            NumberField::new('latitud', 'Latitud'),
            NumberField::new('longitud', 'Longitud')
        ];
    }

}
