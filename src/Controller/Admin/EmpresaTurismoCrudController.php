<?php

namespace App\Controller\Admin;

use App\Entity\EmpresaTurismo;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class EmpresaTurismoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return EmpresaTurismo::class;
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
