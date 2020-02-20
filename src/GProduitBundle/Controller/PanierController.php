<?php


namespace GProduitBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse ;
use Symfony\Component\HttpFoundation\Request;

class PanierController extends Controller
{
    public function afficherAction(){

        $em = $this->getDoctrine()->getManager();
        $produits=$em->getRepository('GProduitBundle:Produit')->findAll();
        return $this->render('@VFront/FrontTemplate/category.html.twig',array(
            'produits'=>$produits
        ));
    }

    public function ajouterpanierAction(Request $request,$id)
    {
        $session = $request->getSession();

        if (!$session->has('panier')) $session->set('panier', array());
        $panier = $session->get('panier');

        if (array_key_exists($id, $panier)) {
            if ($request->query->get('quantite') != null) $panier[$id] = $request->query->get('quantite');
            $this->get('session')->getFlashBag()->add('success', 'Quantité modifié avec succès');
        } else {
            if ($request->query->get('quantite') != null) {
                $panier[$id] = $request->query->get('quantite');
            } else {
                $panier[$id] = 1;
            }
            $this->get('session')->getFlashBag()->add('success', 'Article ajouté avec succès');
        }

        $session->set('panier', $panier);

        return $this->redirect($this->generateUrl('panier'));

    }

    public function panierAction(Request $request)
    {
        $session = $request->getSession();
        // var_dump($session->get('panier'));
        // die();
        if (!$session->has('panier')) $session->set('panier',array());
        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository('GProduitBundle:Produit')->findArray(array_keys($session->get('panier')));

        return $this->render('@VFront/FrontTemplate/cart.html.twig',array('produits' => $produits,
            'panier' => $session->get('panier')) );

    }

    public function supprimerpanierpAction(Request $request,$id)
    {
        $session = $request->getSession();
        $panier = $session->get('panier');

        if (array_key_exists($id, $panier))
        {
            unset($panier[$id]);
            $session->set('panier',$panier);
            $this->get('session')->getFlashBag()->add('success','Article supprimé avec succès');
        }

        return $this->redirect($this->generateUrl('panier'));
    }

    public function menuAction(Request $request)
    {
        $session = $request->getSession();
        if (!$session->has('panier'))
        {
            $articles = 0;
        } else {
            $articles = count($session->get('panier'));
        }
        return $this->render('@VFront/FrontTemplate/panierCm.html.twig', array('articles' => $articles));
    }


}