<?php

namespace App\Controller;

use App\Entity\Filier;
use App\Form\FilierType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;

class FilierController extends AbstractController
{
    /**
     * @Route("/filier", name="app_filier")
     */
    public function index(): Response
    {
        return $this->render('filier/index.html.twig', [
            'controller_name' => 'FilierController',
        ]);
    }

    /**
     * @Route("/filier/add", name="add_filier")
     */
    public function new(Request $request): Response
    {
        $filier = new Filier();
        $form = $this->createForm(FilierType::class, $filier);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($filier);
            $entityManager->flush();

            return $this->redirectToRoute('filier_list');
        }

        return $this->render('filier/AddFilier.html.twig', [
            'form' => $form->createView(),
        ]);
    }



    /**
     * @Route("/filier/list", name="filier_list")
     */
    public function list(): Response
    {
        $filiers = $this->getDoctrine()->getRepository(Filier::class)->findAll();

        return $this->render('filier/list.html.twig', [
            'filiers' => $filiers,
        ]);
    }


    /**
    * @Route("/filier/delete/{id}", name="filier_delete")
    */
    public function delete(int $id, EntityManagerInterface $entityManager): RedirectResponse
    {
        $filier = $entityManager->getRepository(Filier::class)->find($id);
    
        if (!$filier) {
            throw $this->createNotFoundException('La filier n\'existe pas');
        }
    
        $entityManager->remove($filier);
        $entityManager->flush();
    
        return $this->redirectToRoute('filier_list');
    }


        /**
    * @Route("/filier/update/{id}", name="filier_update")
    */
    public function update(Request $request, $id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $filier = $entityManager->getRepository(Filier::class)->find($id);
    
        if (!$filier) {
            throw $this->createNotFoundException('Aucun étudiant trouvé pour cet identifiant : '.$id);
        }
    
        $form = $this->createForm(FilierType::class, $filier);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
    
            return $this->redirectToRoute('filier_list');
        }
    
        return $this->render('filier/update.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
