<?php

namespace App\Controller;

use App\Entity\TournoiUser;
use App\Form\TournoiUserType;
use App\Repository\TournoiUserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tournoi/user")
 */
class TournoiUserController extends AbstractController
{
    /**
     * @Route("/", name="tournoi_user_index", methods={"GET"})
     */
    public function index(TournoiUserRepository $tournoiUserRepository): Response
    {
        return $this->render('tournoi_user/index.html.twig', [
            'tournoi_users' => $tournoiUserRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="tournoi_user_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tournoiUser = new TournoiUser();
        $form = $this->createForm(TournoiUserType::class, $tournoiUser);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tournoiUser);
            $entityManager->flush();

            return $this->redirectToRoute('tournoi_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('tournoi_user/new.html.twig', [
            'tournoi_user' => $tournoiUser,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="tournoi_user_show", methods={"GET"})
     */
    public function show(TournoiUser $tournoiUser): Response
    {
        return $this->render('tournoi_user/show.html.twig', [
            'tournoi_user' => $tournoiUser,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="tournoi_user_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TournoiUser $tournoiUser): Response
    {
        $form = $this->createForm(TournoiUserType::class, $tournoiUser);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tournoi_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('tournoi_user/edit.html.twig', [
            'tournoi_user' => $tournoiUser,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="tournoi_user_delete", methods={"POST"})
     */
    public function delete(Request $request, TournoiUser $tournoiUser): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tournoiUser->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tournoiUser);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tournoi_user_index', [], Response::HTTP_SEE_OTHER);
    }
}
