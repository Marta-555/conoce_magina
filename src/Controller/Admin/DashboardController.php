<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Municipio;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\Admin\MunicipioCrudController;
use App\Entity\ActividadOcio;
use App\Entity\Alojamiento;
use App\Entity\Categoria;
use App\Entity\EmpresaTurismo;
use App\Entity\Pub;
use App\Entity\PuntoInteres;
use App\Entity\Restaurante;
use App\Entity\Ruta;
use App\Entity\TipoEmpresa;
use App\Entity\TipoRuta;
use App\Entity\VisitaGuiada;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

#[IsGranted('ROLE_ADMIN')]
class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(MunicipioCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Panel de Gestión');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToRoute('Página principal', 'fa fa-home', 'app_main');

        yield MenuItem::linkToCrud('Usuarios', 'fas fa-user', User::class);

        yield MenuItem::linkToCrud('Núcleos de población', 'fas fa-city', Municipio::class);

        yield MenuItem::subMenu('Categorías', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Tipos de servicios', 'fas fa-concierge-bell', Categoria::class),
            MenuItem::linkToCrud('Tipos de empresas', 'fas fa-briefcase', TipoEmpresa::class)
        ]);

        yield MenuItem::subMenu('Servicios', 'fas fa-concierge-bell')->setSubItems([
            MenuItem::linkToCrud('Alojamientos', 'fas fa-bed', Alojamiento::class),
            MenuItem::linkToCrud('Restaurantes', 'fas fa-utensils', Restaurante::class),
            MenuItem::linkToCrud('Ocio nocturno', 'fas fa-wine-glass', Pub::class)
        ]);

        yield MenuItem::subMenu('Turismo', 'fas fa-landmark')->setSubItems([
            MenuItem::linkToCrud('Empresas turísticas', 'fas fa-briefcase', EmpresaTurismo::class),
            MenuItem::linkToCrud('Actividades de Ocio', 'fas fa-biking', ActividadOcio::class),
            MenuItem::linkToCrud('Visitas guiadas', 'fas fa-place-of-worship', VisitaGuiada::class)
        ]);

        yield MenuItem::subMenu('Rutas', 'fas fa-map-marked-alt')->setSubItems([
            MenuItem::linkToCrud('Rutas y senderos', 'fas fa-hiking', Ruta::class),
            MenuItem::linkToCrud('Puntos de interés', 'fas fa-map-marker-alt', PuntoInteres::class),
            MenuItem::linkToCrud('Tipos de ruta', 'fas fa-route', TipoRuta::class)
        ]);

    }
}
