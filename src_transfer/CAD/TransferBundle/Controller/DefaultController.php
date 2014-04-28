<?php

namespace CAD\TransferBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('CADTransferBundle:Default:index.html.twig', array('name' => $name));
    }
}
