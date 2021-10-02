<?php

namespace App\Controller;

use App\Entity\Interclub;
use App\Form\InterclubType;
use App\Repository\InterclubRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/interclub")
 */
class InterclubController extends AbstractController
{
    /**
     * @Route("/", name="interclub_index", methods={"GET"})
     */
    public function index(InterclubRepository $interclubRepository): Response
    {
        return $this->render('interclub/index.html.twig', [
            'interclubs' => $interclubRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="interclub_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $interclub = new Interclub();
        $form = $this->createForm(InterclubType::class, $interclub);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($interclub);
            $entityManager->flush();

            return $this->redirectToRoute('interclub_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('interclub/new.html.twig', [
            'interclub' => $interclub,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="interclub_show", methods={"GET"})
     */
    public function show(Interclub $interclub): Response
    {
        return $this->render('interclub/show.html.twig', [
            'interclub' => $interclub,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="interclub_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Interclub $interclub): Response
    {
        $form = $this->createForm(InterclubType::class, $interclub);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('interclub_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('interclub/edit.html.twig', [
            'interclub' => $interclub,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="interclub_delete", methods={"POST"})
     */
    public function delete(Request $request, Interclub $interclub): Response
    {
        if ($this->isCsrfTokenValid('delete'.$interclub->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($interclub);
            $entityManager->flush();
        }

        return $this->redirectToRoute('interclub_index', [], Response::HTTP_SEE_OTHER);
    }
}
