<?php

namespace App\Controller\Admin;

use App\Entity\PuntoInteres;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PuntoInteresCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PuntoInteres::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
