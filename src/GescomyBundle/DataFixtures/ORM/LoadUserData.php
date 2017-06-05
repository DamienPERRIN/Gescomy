<?php
/**
 * Created by PhpStorm.
 * User: wilder
 * Date: 21/05/17
 * Time: 15:55
 */

namespace GescomyBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use GescomyBundle\Entity\User;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * @var Container
     */
    public $container;

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setPassword('azerty');
        $encoder = $this->container->get('security.password_encoder');
        $password = $encoder->encodePassword($user, $user->getPassword());
        $user->setUsername('damien');
        $user->setEmail('damien@gescom.com');
        $user->setRoles(['ROLE_USER']);
        $user->setPassword($password);
        $manager->persist($user);

        $user = new User();
        $user->setPassword('123456');
        $encoder = $this->container->get('security.password_encoder');
        $password = $encoder->encodePassword($user, $user->getPassword());
        $user->setUsername('admin');
        $user->setEmail('admin@gescom.com');
        $user->setRoles(['ROLE_ADMIN']);
        $user->setPassword($password);
        $manager->persist($user);

        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 4;
    }

    /**
     * @param mixed $container
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

}