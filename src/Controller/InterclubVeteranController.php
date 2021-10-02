<?php

namespace App\Controller;

use App\Entity\InterclubVeteran;
use App\Form\InterclubVeteranType;
use App\Repository\InterclubVeteranRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/interclub/veteran")
 */
class InterclubVeteranController extends AbstractController
{
    /**
     * @Route("/", name="interclub_veteran_index", methods={"GET"})
     */
    public function index(InterclubVeteranRepository $interclubVeteranRepository): Response
    {
        return $this->render('interclub_veteran/index.html.twig', [
            'interclub_veterans' => $interclubVeteranRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="interclub_veteran_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $interclubVeteran = new InterclubVeteran();
        $form = $this->createForm(InterclubVeteranType::class, $interclubVeteran);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($interclubVeteran);
            $entityManager->flush();

            return $this->redirectToRoute('interclub_veteran_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('interclub_veteran/new.html.twig', [
            'interclub_veteran' => $interclubVeteran,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="interclub_veteran_show", methods={"GET"})
     */
    public function show(InterclubVeteran $interclubVeteran): Response
    {
        return $this->render('interclub_veteran/show.html.twig', [
            'interclub_veteran' => $interclubVeteran,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="interclub_veteran_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, InterclubVeteran $interclubVeteran): Response
    {
        $form = $this->createForm(InterclubVeteranType::class, $interclubVeteran);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('interclub_veteran_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('interclub_veteran/edit.html.twig', [
            'interclub_veteran' => $interclubVeteran,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="interclub_veteran_delete", methods={"POST"})
     */
    public function delete(Request $request, InterclubVeteran $interclubVeteran): Response
    {
        if ($this->isCsrfTokenValid('delete'.$interclubVeteran->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($interclubVeteran);
            $entityManager->flush();
        }

        return $this->redirectToRoute('interclub_veteran_index', [], Response::HTTP_SEE_OTHER);
    }
}
