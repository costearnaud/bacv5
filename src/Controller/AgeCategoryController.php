<?php

namespace App\Controller;

use App\Entity\AgeCategory;
use App\Form\AgeCategoryType;
use App\Repository\AgeCategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/age/category")
 */
class AgeCategoryController extends AbstractController
{
    /**
     * @Route("/", name="age_category_index", methods={"GET"})
     */
    public function index(AgeCategoryRepository $ageCategoryRepository): Response
    {
        return $this->render('age_category/index.html.twig', [
            'age_categories' => $ageCategoryRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="age_category_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $ageCategory = new AgeCategory();
        $form = $this->createForm(AgeCategoryType::class, $ageCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ageCategory);
            $entityManager->flush();

            return $this->redirectToRoute('age_category_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('age_category/new.html.twig', [
            'age_category' => $ageCategory,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="age_category_show", methods={"GET"})
     */
    public function show(AgeCategory $ageCategory): Response
    {
        return $this->render('age_category/show.html.twig', [
            'age_category' => $ageCategory,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="age_category_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, AgeCategory $ageCategory): Response
    {
        $form = $this->createForm(AgeCategoryType::class, $ageCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('age_category_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('age_category/edit.html.twig', [
            'age_category' => $ageCategory,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="age_category_delete", methods={"POST"})
     */
    public function delete(Request $request, AgeCategory $ageCategory): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ageCategory->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($ageCategory);
            $entityManager->flush();
        }

        return $this->redirectToRoute('age_category_index', [], Response::HTTP_SEE_OTHER);
    }
}
