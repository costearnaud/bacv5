<?php

namespace App\Controller;

use App\Entity\QcmValue;
use App\Form\QcmValueType;
use App\Repository\QcmValueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/qcm/value")
 */
class QcmValueController extends AbstractController
{
    /**
     * @Route("/", name="qcm_value_index", methods={"GET"})
     */
    public function index(QcmValueRepository $qcmValueRepository): Response
    {
        return $this->render('qcm_value/index.html.twig', [
            'qcm_values' => $qcmValueRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="qcm_value_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $qcmValue = new QcmValue();
        $form = $this->createForm(QcmValueType::class, $qcmValue);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($qcmValue);
            $entityManager->flush();

            return $this->redirectToRoute('qcm_value_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('qcm_value/new.html.twig', [
            'qcm_value' => $qcmValue,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="qcm_value_show", methods={"GET"})
     */
    public function show(QcmValue $qcmValue): Response
    {
        return $this->render('qcm_value/show.html.twig', [
            'qcm_value' => $qcmValue,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="qcm_value_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, QcmValue $qcmValue): Response
    {
        $form = $this->createForm(QcmValueType::class, $qcmValue);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('qcm_value_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('qcm_value/edit.html.twig', [
            'qcm_value' => $qcmValue,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="qcm_value_delete", methods={"POST"})
     */
    public function delete(Request $request, QcmValue $qcmValue): Response
    {
        if ($this->isCsrfTokenValid('delete'.$qcmValue->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($qcmValue);
            $entityManager->flush();
        }

        return $this->redirectToRoute('qcm_value_index', [], Response::HTTP_SEE_OTHER);
    }
}
