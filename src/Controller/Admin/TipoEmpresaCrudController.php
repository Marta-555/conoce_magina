<?php

namespace App\Controller\Admin;

use App\Entity\TipoEmpresa;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TipoEmpresaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TipoEmpresa::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('descripcion', 'Descripción')
        ];
    }

}
