<?php


namespace GProduitBundle\Controller;


use GProduitBundle\Entity\Categorie;
use GProduitBundle\Entity\Produit;
use GProduitBundle\Form\CategorieType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CategorieController extends Controller
{
    public function afficherAction(){

        $em = $this->getDoctrine()->getManager();
        $categorie=$em->getRepository('GProduitBundle:Categorie')->findAll();

        return $this->render('@VBack/Template/gestion_categorie.html.twig',array(
            'categories'=>$categorie
        ));
    }

    public function ajouterAction(Request $request){
        $categorie = new Categorie() ;
        $form =$this->createForm(CategorieType::class,$categorie);
        $form->HandleRequest($request);
        if ($form->isSubmitted()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($categorie);
            $em->flush();
            return $this->redirectToRoute("gestion_categorie") ;
        }
        return $this->render("@GProduit/Categorie/ajouter_categorie.html.twig",array(
            'form'=>$form->createView()
        ));
    }

    public function modifierAction(Request $request,$id){
        $em=$this->getDoctrine()->getManager();
        $categorie=$em->getRepository("GProduitBundle:Categorie")->find($id);
        $form=$this->createForm(CategorieType::class,$categorie);
        $form->handleRequest($request);
        if ($form->isSubmitted()){
            $em->persist($categorie);
            $em->flush();
            return $this->redirectToRoute("gestion_categorie") ;
        }
        return $this->render("@GProduit/Categorie/modifier_categorie.html.twig",array(
            'form'=>$form->createView()
        ));
    }

    public function supprimerAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $categorie = $em->getRepository("GProduitBundle:Categorie")->find($id);
        $em->remove($categorie);
        $em->flush();
        return $this->redirectToRoute("gestion_categorie");
    }






}