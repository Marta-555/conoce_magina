<?php

namespace App\Controller\Admin;

use App\Entity\Restaurante;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class RestauranteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Restaurante::class;
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
