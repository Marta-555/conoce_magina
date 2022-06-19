<?php

namespace App\Controller\Admin;

use App\Entity\Ruta;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;

class RutaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Ruta::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm()->hideOnIndex(),
            TextField::new('titulo', 'Título'),
            TextEditorField::new('descripcion', 'Descripción'),
            ChoiceField::new('dificultad', 'Dificultad')->setChoices([
                'Alta' => 'Alta',
                'Media' => 'Media',
                'Baja' => 'Baja',
            ]),
            NumberField::new('longitud', 'Longitud'),
            NumberField::new('tiempo', 'Tiempo'),
            IntegerField::new('desnivel', 'Desnivel'),
            ImageField::new('image', 'Imagen')
                ->setBasePath('images/uploads-ruta')
                ->setUploadDir('public/images/uploads-ruta')
                ->setUploadedFileNamePattern('[slug]-[timestamp].[extension]'),
            AssociationField::new('municipio', 'Municipio'),
            AssociationField::new('tipoRuta', 'Tipo de ruta'),
            AssociationField::new('user', 'Usuario'),
            DateTimeField::new('fecha_publicacion', 'Fecha de publicación'),
            TextField::new('mapa', 'Mapa'),
        ];
    }

}
