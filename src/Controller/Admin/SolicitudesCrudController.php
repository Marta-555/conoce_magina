<?php

namespace App\Controller\Admin;

use App\Entity\Solicitudes;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SolicitudesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Solicitudes::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm()->hideOnIndex(),
            TextField::new('nombre', 'Nombre'),
            EmailField::new('email', 'Email'),
            TextEditorField::new('descripcion', 'Descripción'),
        ];
    }

}
