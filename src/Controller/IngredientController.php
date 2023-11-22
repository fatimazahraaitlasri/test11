<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IngredientController extends AbstractController
{

    /**
     * @Route("/", name="app_ingredient_index")
     */
    public function index(): Response
    {
        return $this->render('ingredient/index.html.twig', [
            'controller_name' => 'IngredientController',
        ]);
    }

    /**
     * @Route("/form", name="app_ingredient_form")
     */
    public function form(): Response
    {
        return $this->render('ingredient/form.html.twig', [
            'controller_name' => 'IngredientController',
        ]);
    }

    /**
     * @Route("/contact", name="app_ingredient_contact")
     */
    public function contact(): Response
    {
        return $this->render('ingredient/contact.html.twig', [
            'controller_name' => 'IngredientController',
        ]);
    }

    /**
     * @Route("/expertises", name="app_ingredient_expertises")
     */
    public function expertises(): Response
    {
        return $this->render('ingredient/expertises.html.twig', [
            'controller_name' => 'IngredientController',
        ]);
    }

}
