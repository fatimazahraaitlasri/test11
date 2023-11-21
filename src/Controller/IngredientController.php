<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IngredientController extends AbstractController
{
  


        /**
     * @Route("/form", name="app_ingredient")
     */
    public function form(): Response
    {
        return $this->render('ingredient/form.html.twig', [
            'controller_name' => 'IngredientController',
        ]);
    }


       /**
     * @Route("/cabinet", name="app_ingredient")
     */
    public function cabinet(): Response
    {
        return $this->render('ingredient/cabinet.html.twig', [
            'controller_name' => 'IngredientController',
        ]);
    } 

       /**
     * @Route("/expertises", name="app_ingredient")
     */
    public function expertises(): Response
    {
        return $this->render('ingredient/expertises.html.twig', [
            'controller_name' => 'IngredientController',
        ]);
    }
    


    
    /**
     * @Route("/contact", name="app_ingredient")
     */
    public function contact(): Response
    {
        return $this->render('ingredient/contact.html.twig', [
            'controller_name' => 'IngredientController',
        ]);
    } 
    
    /**
* @Route("/", name="app_ingredient")
*/
public function index(): Response
{
return $this->render('ingredient/index.html.twig', [
    'controller_name' => 'IngredientController',
]);
} 
}
