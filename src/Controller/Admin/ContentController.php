<?php

namespace App\Controller\Admin;

use App\Entity\Content;
use App\Form\ContentType;
use App\Repository\ContentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/content")
 */
class ContentController extends AbstractController
{
    /**
     * @Route("/", name="admin.content_index", methods="GET")
     */
    public function index(ContentRepository $contentRepository): Response
    {
        return $this->render('admin/content/index.html.twig', ['contents' => $contentRepository->findAll()]);
    }

    /**
     * @Route("/new", name="admin.content_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $content = new Content();
        $form = $this->createForm(ContentType::class, $content);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($content);
            $em->flush();

            return $this->redirectToRoute('admin.content_index');
        }

        return $this->render('admin/content/new.html.twig', [
            'content' => $content,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin.content_show", methods="GET")
     */
    public function show(Content $content): Response
    {
        return $this->render('admin/content/show.html.twig', ['content' => $content]);
    }

    /**
     * @Route("/{id}/edit", name="admin.content_edit", methods="GET|POST")
     */
    public function edit(Request $request, Content $content): Response
    {
        $form = $this->createForm(ContentType::class, $content);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin.content_edit', ['id' => $content->getId()]);
        }

        return $this->render('admin/content/edit.html.twig', [
            'content' => $content,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="admin.content_delete", methods="DELETE")
     */
    public function delete(Request $request, Content $content): Response
    {
        if ($this->isCsrfTokenValid('delete'.$content->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($content);
            $em->flush();
        }

        return $this->redirectToRoute('admin.content_index');
    }
}
