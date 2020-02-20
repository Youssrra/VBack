<?php

namespace VFrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('@VFront/Default/index.html.twig');
    }

    public function categoryAction()
    {
        return $this->render('@VFront/FrontTemplate/category.html.twig');
    }

}
