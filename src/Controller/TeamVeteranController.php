<?php

namespace App\Controller;

use App\Entity\TeamVeteran;
use App\Form\TeamVeteranType;
use App\Repository\TeamVeteranRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/team/veteran")
 */
class TeamVeteranController extends AbstractController
{
    /**
     * @Route("/", name="team_veteran_index", methods={"GET"})
     */
    public function index(TeamVeteranRepository $teamVeteranRepository): Response
    {
        return $this->render('team_veteran/index.html.twig', [
            'team_veterans' => $teamVeteranRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="team_veteran_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $teamVeteran = new TeamVeteran();
        $form = $this->createForm(TeamVeteranType::class, $teamVeteran);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($teamVeteran);
            $entityManager->flush();

            return $this->redirectToRoute('team_veteran_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('team_veteran/new.html.twig', [
            'team_veteran' => $teamVeteran,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="team_veteran_show", methods={"GET"})
     */
    public function show(TeamVeteran $teamVeteran): Response
    {
        return $this->render('team_veteran/show.html.twig', [
            'team_veteran' => $teamVeteran,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="team_veteran_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TeamVeteran $teamVeteran): Response
    {
        $form = $this->createForm(TeamVeteranType::class, $teamVeteran);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('team_veteran_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('team_veteran/edit.html.twig', [
            'team_veteran' => $teamVeteran,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="team_veteran_delete", methods={"POST"})
     */
    public function delete(Request $request, TeamVeteran $teamVeteran): Response
    {
        if ($this->isCsrfTokenValid('delete'.$teamVeteran->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($teamVeteran);
            $entityManager->flush();
        }

        return $this->redirectToRoute('team_veteran_index', [], Response::HTTP_SEE_OTHER);
    }
}
