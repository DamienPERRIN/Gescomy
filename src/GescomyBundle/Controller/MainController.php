<?php

namespace GescomyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class MainController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        $totalProducts = $this->getDoctrine()
            ->getRepository('GescomyBundle:Product')
            ->createQueryBuilder('p')
            ->select('COUNT(p)');
        $totalSuppliers = $this->getDoctrine()
            ->getRepository('GescomyBundle:Supplier')
            ->createQueryBuilder('s')
            ->select('COUNT(s)');
        $totalCategories = $this->getDoctrine()
            ->getRepository('GescomyBundle:Category')
            ->createQueryBuilder('c')
            ->select('COUNT(c)');


        return $this->render('GescomyBundle:Main:index.html.twig', [
            'totalProducts' => $totalProducts->getQuery()->getSingleScalarResult(),
            'totalSuppliers' => $totalSuppliers->getQuery()->getSingleScalarResult(),
            'totalCategories' => $totalCategories->getQuery()->getSingleScalarResult(),
        ]);
    }
}
