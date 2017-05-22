<?php
/**
 * Created by PhpStorm.
 * User: wilder
 * Date: 14/05/17
 * Time: 15:43
 */

namespace GescomyBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use GescomyBundle\Entity\Product;
use GescomyBundle\Entity\ProductSupplier;

class LoadProductData extends AbstractFixture implements OrderedFixtureInterface
{
    const MAX_PRODUCTS = 500;
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        $faker->seed(12345);
        for ($i = 0; $i<self::MAX_PRODUCTS; $i++){
            $product = new Product();
            $product->setName($faker->name);
            $product->setDescription($faker->sentence(3, true));
            $product->setCategory($this->getReference("categories_" . rand(0, 8)));
            $supplierTotal = rand(1, 3);
            $supplierStartNumber = rand(0, LoadSupplierData::MAX_SUPPLIERS - $supplierTotal);
            for ($j=0; $j<$supplierTotal; $j++){
                $productSupplier = new ProductSupplier();
                $productSupplier->setProduct($product);
                $productSupplier->setSupplier($this->getReference("suppliers_" . $supplierStartNumber));
                $supplierStartNumber++;
                $manager->persist($productSupplier);
            }
            $manager->persist($product);
        }
        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 3;
    }
}