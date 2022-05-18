<?php

namespace App\Controller\Admin;

use App\Entity\ActividadOcio;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ActividadOcioCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ActividadOcio::class;
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
