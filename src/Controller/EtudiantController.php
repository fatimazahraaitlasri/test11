<?php

namespace App\Controller;
use App\Entity\Etudiant;
use App\Form\EtudiantType;
use App\Repository\EtudiantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;


class EtudiantController extends AbstractController
{
    /**
     * @Route("/etudiant", name="app_etudiant")
     */
    public function index(): Response
    {
        return $this->render('etudiant/index.html.twig', [
            'controller_name' => 'EtudiantController',
        ]);
    }


/**
 * @Route("/etudiant/add", name="etudiant_add")
 */
public function new(Request $request): Response
{
    $etudiant = new Etudiant();
    $form = $this->createForm(EtudiantType::class, $etudiant);

    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($etudiant);
        $entityManager->flush();

        return $this->redirectToRoute('etudiant_list');
    }

    return $this->render('etudiant/new.html.twig', [
        'form' => $form->createView(),
    ]);
}


    /**
     * @Route("/etudiant/list", name="etudiant_list")
     */
    public function list(): Response
    {
        $etudiants = $this->getDoctrine()->getRepository(Etudiant::class)->findAll();

        return $this->render('etudiant/list.html.twig', [
            'etudiants' => $etudiants,
        ]);
    }
    

    /**
    * @Route("/etudiant/delete/{id}", name="etudiant_delete")
    */
    public function delete(int $id, EntityManagerInterface $entityManager): RedirectResponse
    {
        $etudiant = $entityManager->getRepository(Etudiant::class)->find($id);
    
        if (!$etudiant) {
            throw $this->createNotFoundException('L\'étudiant n\'existe pas');
        }
    
        $entityManager->remove($etudiant);
        $entityManager->flush();
    
        return $this->redirectToRoute('etudiant_list');
    }

    /**
    * @Route("/etudiant/update/{id}", name="etudiant_update")
    */
   public function update(Request $request, $id): Response
{
    $entityManager = $this->getDoctrine()->getManager();
    $etudiant = $entityManager->getRepository(Etudiant::class)->find($id);

    if (!$etudiant) {
        throw $this->createNotFoundException('Aucun étudiant trouvé pour cet identifiant : '.$id);
    }

    $form = $this->createForm(EtudiantType::class, $etudiant);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $entityManager->flush();

        return $this->redirectToRoute('etudiant_list');
    }

    return $this->render('etudiant/update.html.twig', [
        'form' => $form->createView(),
    ]);
}

}
