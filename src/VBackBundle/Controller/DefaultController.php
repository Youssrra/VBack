<?php

namespace VBackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@VBack/Default/index.html.twig');
    }
    public function layoutAction()
    {
        return $this->render('@VBack/layout.html.twig');
    }


    public function accuilAction()
    {

        return $this->render('@VBack/Template/index.html.twig');
    }


    public function gestion_clientAction()
    {
        return $this->render('@VBack/Template/gestion_client.html.twig');
    }

    public function gestion_partenaireAction()
    {
        return $this->render('@VBack/Template/gestion_partenaire.html.twig');
    }
    public function gestion_administrateurAction()
    {
        return $this->render('@VBack/Template/gestion_administrateur.html.twig');
    }
    public function gestion_annonceAction()
    {
        return $this->render('@VBack/Template/gestion_annonce.html.twig');
    }
    public function gestion_clubAction()
    {
        return $this->render('@VBack/Template/gestion_club.html.twig');
    }
    public function gestion_commandeAction()
    {
        return $this->render('@VBack/Template/gestion_commande.html.twig');
    }
    public function gestion_evenementAction()
    {
        return $this->render('@VBack/Template/gestion_evenement.html.twig');
    }
    public function gestion_livraisonAction()
    {
        return $this->render('@VBack/Template/gestion_livraison.html.twig');
    }
    public function gestion_publiciteAction()
    {
        return $this->render('@VBack/Template/gestion_publicite.html.twig');
    }
    public function gestion_reclamationAction()
    {
        return $this->render('@VBack/Template/gestion_reclamation.html.twig');
    }
    public function gestion_stockAction()
    {
        return $this->render('@VBack/Template/gestion_stock.html.twig');
    }
    public function loginAdAction()
    {
        return $this->render('@VBack/Template/login.html.twig');
    }










}
