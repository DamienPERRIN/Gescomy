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
use GescomyBundle\Entity\Supplier;

class LoadSupplierData extends AbstractFixture implements OrderedFixtureInterface
{
    const MAX_SUPPLIERS = 100;

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {

        $faker = Factory::create('fr_FR');
        $faker->seed(12345);
        for ($i=0; $i<self::MAX_SUPPLIERS; $i++){
            $supplier = new Supplier();
            $supplier->setName($faker->name);
            $supplier->setAdress($faker->address);
            $supplier->setEmail($faker->email);
            $supplier->setPostCode(rand(10000, 89999));
            $supplier->setTown($faker->city);
            $supplier->setSiret($faker->siret);
            $supplier->setWebSite($faker->url);
            $supplier->setDeliveryTime(rand(1, 30));
            $supplier->setScore(rand(1, 5));
            $manager->persist($supplier);
            $this->setReference("suppliers_" . $i, $supplier);
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
        return 2;
    }
}