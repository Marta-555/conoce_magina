<?php

namespace App\Controller\Admin;

use App\Entity\Alojamiento;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AlojamientoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Alojamiento::class;
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
