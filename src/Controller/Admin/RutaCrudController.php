<?php

namespace App\Controller\Admin;

use App\Entity\Ruta;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class RutaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Ruta::class;
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
