<?php

namespace GescomyBundle\Controller;

use GescomyBundle\Entity\Category;
use GescomyBundle\Form\CategoryType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends Controller
{
    /**
     * @Route("/category", name="category")
     */
    public function indexAction()
    {
        $categories = $this->getDoctrine()->getRepository('GescomyBundle:Category')->findAll();
        return $this->render('@Gescomy/Category/category.html.twig', array(
            'categories' => $categories,
            ));
    }

    /**
     * @param Request $request
     * @Route("/category/add", name="add_category")
     */
    public function addAction(Request $request)
    {
        $category = new Category();

        $form = $this->createForm(CategoryType::class, $category);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();
            return $this->redirectToRoute('category');
        }
        return $this->render('@Gescomy/Category/addCategory.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @param Request $request
     * @param Category $category
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Route("category/edit/{category}", name="edit_category")
     */
    public function editAction(Request $request, Category $category)
    {
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(CategoryType::class, $category);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $em->flush();
            return $this->redirectToRoute('category');
        }
        return $this->render('@Gescomy/Category/addCategory.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @param Category $category
     * @Route("category/delete/{category}", name="delete_category")
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteAction(Category $category)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($category);
        $em->flush();
        return $this->redirectToRoute('category');
    }
}
