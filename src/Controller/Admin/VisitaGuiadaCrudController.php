<?php

namespace App\Controller\Admin;

use App\Entity\VisitaGuiada;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class VisitaGuiadaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return VisitaGuiada::class;
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
