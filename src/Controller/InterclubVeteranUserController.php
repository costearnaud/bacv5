<?php

namespace App\Controller;

use App\Entity\InterclubVeteranUser;
use App\Form\InterclubVeteranUserType;
use App\Repository\InterclubVeteranUserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/interclub/veteran/user")
 */
class InterclubVeteranUserController extends AbstractController
{
    /**
     * @Route("/", name="interclub_veteran_user_index", methods={"GET"})
     */
    public function index(InterclubVeteranUserRepository $interclubVeteranUserRepository): Response
    {
        return $this->render('interclub_veteran_user/index.html.twig', [
            'interclub_veteran_users' => $interclubVeteranUserRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="interclub_veteran_user_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $interclubVeteranUser = new InterclubVeteranUser();
        $form = $this->createForm(InterclubVeteranUserType::class, $interclubVeteranUser);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($interclubVeteranUser);
            $entityManager->flush();

            return $this->redirectToRoute('interclub_veteran_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('interclub_veteran_user/new.html.twig', [
            'interclub_veteran_user' => $interclubVeteranUser,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="interclub_veteran_user_show", methods={"GET"})
     */
    public function show(InterclubVeteranUser $interclubVeteranUser): Response
    {
        return $this->render('interclub_veteran_user/show.html.twig', [
            'interclub_veteran_user' => $interclubVeteranUser,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="interclub_veteran_user_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, InterclubVeteranUser $interclubVeteranUser): Response
    {
        $form = $this->createForm(InterclubVeteranUserType::class, $interclubVeteranUser);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('interclub_veteran_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('interclub_veteran_user/edit.html.twig', [
            'interclub_veteran_user' => $interclubVeteranUser,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="interclub_veteran_user_delete", methods={"POST"})
     */
    public function delete(Request $request, InterclubVeteranUser $interclubVeteranUser): Response
    {
        if ($this->isCsrfTokenValid('delete'.$interclubVeteranUser->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($interclubVeteranUser);
            $entityManager->flush();
        }

        return $this->redirectToRoute('interclub_veteran_user_index', [], Response::HTTP_SEE_OTHER);
    }
}
