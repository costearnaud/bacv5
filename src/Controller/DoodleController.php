<?php

namespace App\Controller;

use App\Entity\Doodle;
use App\Form\DoodleType;
use App\Repository\DoodleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/doodle")
 */
class DoodleController extends AbstractController
{
    /**
     * @Route("/", name="doodle_index", methods={"GET"})
     */
    public function index(DoodleRepository $doodleRepository): Response
    {
        return $this->render('doodle/index.html.twig', [
            'doodles' => $doodleRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="doodle_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $doodle = new Doodle();
        $form = $this->createForm(DoodleType::class, $doodle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($doodle);
            $entityManager->flush();

            return $this->redirectToRoute('doodle_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('doodle/new.html.twig', [
            'doodle' => $doodle,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="doodle_show", methods={"GET"})
     */
    public function show(Doodle $doodle): Response
    {
        return $this->render('doodle/show.html.twig', [
            'doodle' => $doodle,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="doodle_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Doodle $doodle): Response
    {
        $form = $this->createForm(DoodleType::class, $doodle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('doodle_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('doodle/edit.html.twig', [
            'doodle' => $doodle,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="doodle_delete", methods={"POST"})
     */
    public function delete(Request $request, Doodle $doodle): Response
    {
        if ($this->isCsrfTokenValid('delete'.$doodle->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($doodle);
            $entityManager->flush();
        }

        return $this->redirectToRoute('doodle_index', [], Response::HTTP_SEE_OTHER);
    }
}
