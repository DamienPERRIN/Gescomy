<?php

namespace GescomyBundle\Controller;

use GescomyBundle\Entity\Product;
use GescomyBundle\Form\ProductType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends Controller
{
    /**
     * @Route("/product", name="product")
     */
    public function indexAction()
    {
        $products = $this->getDoctrine()->getRepository('GescomyBundle:Product')->findAll();
        return $this->render('GescomyBundle:Product:product.html.twig', array(
            "products" => $products,
            ));
    }

    /**
     * @param Request $request
     * @Route("/product/add", name="add_product")
     */
    public function addAction(Request $request)
    {
        $product = new Product();
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(ProductType::class, $product);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $em->persist($product);
            $em->flush();
            return $this->redirectToRoute('product');
        }
        return $this->render('@Gescomy/Product/addProduct.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @param Request $request
     * @param Product $product
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Route("/product/edit/{product}", name="edit_product")
     */
    public function editAction(Request $request, Product $product)
    {
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(ProductType::class, $product);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $em->flush();
            return $this->redirectToRoute('product');
        }

        return $this->render('@Gescomy/Product/addProduct.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @param Product $product
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Route("/product/delete/{product}", name="delete_product")
     */
    public function deleteAction(Product $product)
    {
        $em = $this->getDoctrine()->getManager();
        $productSuppliers = $em->getRepository('GescomyBundle:ProductSupplier')->findBy(['product' => $product]);
        foreach ($productSuppliers as $productSupplier){
            $em->remove($productSupplier);
        }
        $em->remove($product);
        $em->flush();
        return $this->redirectToRoute('product');
    }
}