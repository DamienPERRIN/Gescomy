<?php

namespace GescomyBundle\Controller;

use GescomyBundle\Entity\Supplier;
use GescomyBundle\Form\SupplierType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SupplierController extends Controller
{
    /**
     * @Route("/supplier", name="supplier")
     */
    public function indexAction()
    {
        $suppliers = $this->getDoctrine()->getRepository('GescomyBundle:Supplier')->findAll();
        return $this->render('@Gescomy/Supplier/supplier.html.twig', array(
            'suppliers' => $suppliers
        ));
    }

    /**
     * @param Request $request
     * @Route("/supplier/add", name="add_supplier")
     */
    public function addAction(Request $request)
    {
        $supplier = new Supplier();
        $form = $this->createForm(SupplierType::class, $supplier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($supplier);
            $em->flush();
            return $this->redirectToRoute('supplier');
        }
        return $this->render('@Gescomy/Supplier/addSupplier.html.twig', array(
           'form' => $form->createView(),
        ));
    }

    /**
     * @param Request $request
     * @param Supplier $supplier
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/supplier/edit/{supplier}", name="edit_supplier")
     */
    public function editAction(Request $request, Supplier $supplier)
    {
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(SupplierType::class, $supplier);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $em->flush();
            return $this->redirectToRoute('supplier');
        }

        return $this->render("@Gescomy/Supplier/addSupplier.html.twig", array(
            "form" => $form->createView(),
        ));
    }

    /**
     * @param Supplier $supplier
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Route("/supplier/delete/{supplier}", name="delete_supplier")
     */
    public function deleteAction(Supplier $supplier){
        $em = $this->getDoctrine()->getManager();
        $productSuppliers = $em->getRepository('GescomyBundle:ProductSupplier')->findBy(['supplier' => $supplier]);
        foreach ($productSuppliers as $productSupplier){
            $em->remove($productSupplier);
        }
        $em->remove($supplier);
        $em->flush();
        return $this->redirectToRoute('supplier');
    }
}
