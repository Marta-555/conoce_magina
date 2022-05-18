<?php

namespace App\Controller\Admin;

use App\Entity\Municipio;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class MunicipioCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Municipio::class;
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
