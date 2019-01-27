<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use App\Entity\Content;

class PageController extends AbstractController
{
    /**
     * @Route("/{alias}", name="page")
     *
     */
    public function index(Content $content)
    {
        return $this->render('page/content.html.twig', [
            'content' => $content,
        ]);
    }
}
