<?php

namespace App\Controller;

use App\Entity\Ecart;
use App\Form\EcartType;
use App\Repository\EcartRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EcartController extends AbstractController
{

    /**
     * @Route("/", name="ecart_new", methods={"GET","POST"})
     */
    public function index(Request $request, EcartRepository $ecartRepository): Response
    {
        $douzaine1 = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
        $douzaine2 = [13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24];
        $douzaine3 = [25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36];

        $colonne1 = [1, 4, 7, 10, 13, 16, 19, 22, 25, 28, 31, 34];
        $colonne2 = [2, 5, 8, 11, 14, 17, 20, 23, 26, 29, 32, 35];
        $colonne3 = [3, 6, 9, 12, 15, 18, 21, 24, 27, 30, 33, 36];

        $transversale1 = [1, 2, 3, 10, 11, 12, 19, 20, 21, 28, 29, 30];
        $transversale2 = [4, 5, 6, 13, 14, 15, 22, 23, 24, 31, 32, 33];
        $transversale3 = [7, 8, 9, 16, 17, 18, 25, 26, 27, 34, 35, 36];

        $sixain1 = [1, 2, 3, 4, 5, 6, 19, 20, 21, 22, 23, 24];
        $sixain2 = [7, 8, 9, 10, 11, 12, 25, 26, 27, 28, 29, 30];
        $sixain3 = [13, 14, 15, 16, 17, 18, 31, 32, 33, 34, 35, 36];

        $final1 = [1, 2, 3, 11, 12, 13, 21, 22, 23, 31, 32, 33];
        $final2 = [4, 5, 6, 14, 15, 16, 24, 25, 26, 34, 35, 36];
        $final3 = [7, 8, 9, 10, 17, 18, 19, 20, 27, 28, 29, 30];


        $ecart = new Ecart();
        $form = $this->createForm(EcartType::class, $ecart);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $repo = $ecartRepository->findOneBy([], array('id' => 'DESC'));
            // DOUZAINE
            if (!in_array($ecart->getTirage(), $douzaine1)) {
                $ecart->setDouzaine1(($repo->getDouzaine1()) + 1);
            }
            if (!in_array($ecart->getTirage(), $douzaine2)) {
                $ecart->setDouzaine2(($repo->getDouzaine2()) + 1);
            }
            if (!in_array($ecart->getTirage(), $douzaine3)) {
                $ecart->setDouzaine3(($repo->getDouzaine3()) + 1);
            }
            // COLONNE
            if (!in_array($ecart->getTirage(), $colonne1)) {
                $ecart->setColonne1(($repo->getColonne1()) + 1);
            }
            if (!in_array($ecart->getTirage(), $colonne2)) {
                $ecart->setColonne2(($repo->getColonne2()) + 1);
            }
            if (!in_array($ecart->getTirage(), $colonne3)) {
                $ecart->setColonne3(($repo->getColonne3()) + 1);
            }
            // TRANSVERSALE
            if (!in_array($ecart->getTirage(), $transversale1)) {
                $ecart->setTransversale1(($repo->getTransversale1()) + 1);
            }
            if (!in_array($ecart->getTirage(), $transversale2)) {
                $ecart->setTransversale2(($repo->getTransversale2()) + 1);
            }
            if (!in_array($ecart->getTirage(), $transversale3)) {
                $ecart->setTransversale3(($repo->getTransversale3()) + 1);
            }
            // SIXTAIN
            if (!in_array($ecart->getTirage(), $sixain1)) {
                $ecart->setSixain1(($repo->getSixain1()) + 1);
            }
            if (!in_array($ecart->getTirage(), $sixain2)) {
                $ecart->setSixain2(($repo->getSixain2()) + 1);
            }
            if (!in_array($ecart->getTirage(), $sixain3)) {
                $ecart->setSixain3(($repo->getSixain3()) + 1);
            }
            // FINAL
            if (!in_array($ecart->getTirage(), $final1)) {
                $ecart->setFinal1(($repo->getFinal1()) + 1);
            }
            if (!in_array($ecart->getTirage(), $final2)) {
                $ecart->setFinal2(($repo->getFinal2()) + 1);
            }
            if (!in_array($ecart->getTirage(), $final3)) {
                $ecart->setFinal3(($repo->getFinal3()) + 1);
            }
            // RENITIALISATION
            if ($ecart->getTirage()<0) {
                $ecart->setDouzaine1(0);
                $ecart->setDouzaine2(0);
                $ecart->setDouzaine3(0);
                $ecart->setColonne1(0);
                $ecart->setColonne2(0);
                $ecart->setColonne3(0);
                $ecart->setTransversale1(0);
                $ecart->setTransversale2(0);
                $ecart->setTransversale3(0);
                $ecart->setSixain1(0);
                $ecart->setSixain2(0);
                $ecart->setSixain3(0);
                $ecart->setFinal1(0);
                $ecart->setFinal2(0);
                $ecart->setFinal3(0);
            }
            $entityManager->persist($ecart);
            $entityManager->flush();

            return $this->redirectToRoute('ecart_new', ['ecarts' => $ecartRepository->findOneBy([], array('id' => 'DESC')),], Response::HTTP_SEE_OTHER);
        }

        $response = new Response(null, $form->isSubmitted() ? 422 : 200);

        return $this->render('ecart/new.html.twig', [
            'ecarts' => $ecartRepository->findOneBy([], array('id' => 'DESC')),
            'lastecart' => $ecartRepository->findOneBy([], array('id' => 'DESC')),
            'ecart' => $ecart,
            'form' => $form->createView(),
        ], $response);
    }

    /**
     * @Route("/{id}", name="ecart_show", methods={"GET"})
     */
    public function show(Ecart $ecart): Response
    {
        return $this->render('ecart/show.html.twig', [
            'ecart' => $ecart,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="ecart_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Ecart $ecart): Response
    {
        $form = $this->createForm(EcartType::class, $ecart);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ecart_new');
        }

        return $this->render('ecart/edit.html.twig', [
            'ecart' => $ecart,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ecart_delete", methods={"POST"})
     */
    public function delete(Request $request, Ecart $ecart): Response
    {
        if ($this->isCsrfTokenValid('delete' . $ecart->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($ecart);
            $entityManager->flush();
        }

        return $this->redirectToRoute('ecart_index');
    }

    /**
     * @Route("/reinitialize", name="ecart_reinitialize", methods={"POST"})
     */
    public function reinitialize(Ecart $ecart, EcartRepository $ecartRepository)
    {
        $ecart = new Ecart();
        $ecart->setTirage(-1);
        $ecart->setDouzaine1(0);
        $ecart->setDouzaine2(0);
        $ecart->setDouzaine3(0);
        $ecart->setColonne1(0);
        $ecart->setColonne2(0);
        $ecart->setColonne3(0);
        $ecart->setTransversale1(0);
        $ecart->setTransversale2(0);
        $ecart->setTransversale3(0);
        $ecart->setSixain1(0);
        $ecart->setSixain2(0);
        $ecart->setSixain3(0);
        $ecart->setFinal1(0);
        $ecart->setFinal2(0);
        $ecart->setFinal3(0);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($ecart);
        $entityManager->flush();

        return $this->redirectToRoute('ecart_new', ['ecarts' => $ecartRepository->findOneBy([], array('id' => 'DESC')),], Response::HTTP_SEE_OTHER);
    }
}
