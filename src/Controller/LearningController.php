<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LearningController extends AbstractController
{
    /**
     * @Route("/learning", name="learning_index")
     */
    public function index()
    {
        return $this->render('learning/index.html.twig', [
            'controller_name' => 'LearningController',
        ]);
    }
    /**
     * @Route("/about-me", name="learning_aboutMe")
     */
    public function aboutMe (){

        // get the user information and notifications somehow

        // the template path is the relative file path from `templates/`
        return $this->render('learning/aboutMe.html.twig', [
            // this array defines the variables passed to the template,
            // where the key is the variable name and the value is the variable value
            // (Twig recommends using snake_case variable names: 'foo_bar' instead of 'fooBar')
        ]);
    }
    /**
     * @Route("/showMyName", name="learning_showMyName")
     */
    public function showMyName (){
     var_dump($_POST);
     if ($_POST){
         $userName =$_POST['name'];

     } else {
         $userName = 'unknown';
     }

            return $this->render('learning/showMyName.html.twig', [
            // this array defines the variables passed to the template,
            'user_name' => $userName
            // where the key is the variable name and the value is the variable value
            // (Twig recommends using snake_case variable names: 'foo_bar' instead of 'fooBar')
        ]);
    }
    /**
     * @Route("/changeMyName", name="learning_changeMyName",methods={"POST"}) //stupid method post, french
     */
    public function changeMyName(){
            $session = new Session;

            $session->set('name',$_POST['name']);
            return $this->redirectToRoute('learning_showMyName');
    }
}
