<?php

namespace App\Controller;

use App\Entity\LienDoodle;
use App\Form\LienDoodleType;
use App\Repository\LienDoodleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/lien/doodle")
 */
class LienDoodleController extends AbstractController
{
    /**
     * @Route("/", name="lien_doodle_index", methods={"GET"})
     */
    public function index(LienDoodleRepository $lienDoodleRepository): Response
    {
        return $this->render('lien_doodle/index.html.twig', [
            'lien_doodles' => $lienDoodleRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="lien_doodle_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $lienDoodle = new LienDoodle();
        $form = $this->createForm(LienDoodleType::class, $lienDoodle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($lienDoodle);
            $entityManager->flush();

            return $this->redirectToRoute('lien_doodle_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('lien_doodle/new.html.twig', [
            'lien_doodle' => $lienDoodle,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="lien_doodle_show", methods={"GET"})
     */
    public function show(LienDoodle $lienDoodle): Response
    {
        return $this->render('lien_doodle/show.html.twig', [
            'lien_doodle' => $lienDoodle,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="lien_doodle_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, LienDoodle $lienDoodle): Response
    {
        $form = $this->createForm(LienDoodleType::class, $lienDoodle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('lien_doodle_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('lien_doodle/edit.html.twig', [
            'lien_doodle' => $lienDoodle,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="lien_doodle_delete", methods={"POST"})
     */
    public function delete(Request $request, LienDoodle $lienDoodle): Response
    {
        if ($this->isCsrfTokenValid('delete'.$lienDoodle->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($lienDoodle);
            $entityManager->flush();
        }

        return $this->redirectToRoute('lien_doodle_index', [], Response::HTTP_SEE_OTHER);
    }
}
