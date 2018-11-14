<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PagesController extends AbstractController
{
    /**
     * @Route("/admin/pages", name="admin.pages")
     */
    public function index()
    {
        return $this->render('admin/pages/index.html.twig', [
            'controller_name' => 'PagesController',
        ]);
    }
}
