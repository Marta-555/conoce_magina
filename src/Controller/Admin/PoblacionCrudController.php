<?php

namespace App\Controller\Admin;

use App\Entity\Poblacion;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PoblacionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Poblacion::class;
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
