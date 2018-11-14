<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class DashboardController extends AbstractController
{
    /**
     * @Route("/admin", name="admin.dashboard")
     * @Security("has_role('ROLE_USER')")
     */
    public function index()
    {
        return $this->render('admin/dashboard/index.html.twig', [
            'pageTitle' => 'Dashboard',
        ]);
    }
}
