<?php

namespace App\Controller;

use App\Entity\InterclubUser;
use App\Form\InterclubUserType;
use App\Repository\InterclubUserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/interclub/user")
 */
class InterclubUserController extends AbstractController
{
    /**
     * @Route("/", name="interclub_user_index", methods={"GET"})
     */
    public function index(InterclubUserRepository $interclubUserRepository): Response
    {
        return $this->render('interclub_user/index.html.twig', [
            'interclub_users' => $interclubUserRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="interclub_user_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $interclubUser = new InterclubUser();
        $form = $this->createForm(InterclubUserType::class, $interclubUser);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($interclubUser);
            $entityManager->flush();

            return $this->redirectToRoute('interclub_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('interclub_user/new.html.twig', [
            'interclub_user' => $interclubUser,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="interclub_user_show", methods={"GET"})
     */
    public function show(InterclubUser $interclubUser): Response
    {
        return $this->render('interclub_user/show.html.twig', [
            'interclub_user' => $interclubUser,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="interclub_user_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, InterclubUser $interclubUser): Response
    {
        $form = $this->createForm(InterclubUserType::class, $interclubUser);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('interclub_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('interclub_user/edit.html.twig', [
            'interclub_user' => $interclubUser,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="interclub_user_delete", methods={"POST"})
     */
    public function delete(Request $request, InterclubUser $interclubUser): Response
    {
        if ($this->isCsrfTokenValid('delete'.$interclubUser->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($interclubUser);
            $entityManager->flush();
        }

        return $this->redirectToRoute('interclub_user_index', [], Response::HTTP_SEE_OTHER);
    }
}
