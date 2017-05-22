<?php
/**
 * Created by PhpStorm.
 * User: wilder
 * Date: 13/05/17
 * Time: 17:27
 */

namespace GescomyBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use GescomyBundle\Entity\Category;

class LoadCategoryData extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        $faker->seed(12345);

        $categoriesName = array(
            "Ordinateur PC",
            "Ordinateur PC portable",
            "Tablette",
            "Smartphone",
            "Imprimante",
            "Moniteur",
            "Consommables",
            "Réseau",
            "Connectique",
            "Iphone",
        );

        foreach ($categoriesName as $key => $categoryName) {
            $category = new category();
            $category->setName($categoryName);
            $category->setDescription($faker->sentences(3, true));
            $manager->persist($category);
            $this->setReference("categories_" . $key, $category);
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
        return 1;
    }
}