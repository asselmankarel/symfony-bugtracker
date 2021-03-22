<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setFirstName("Karel");
        $user->setLastName("Asselman");
        $user->setEmail("asselman.karel@gmail.com");
        $user->setPassword($this->passwordEncoder->encodePassword($user, "123456"));

        $manager->persist($user);
        $manager->flush();
    }
}
