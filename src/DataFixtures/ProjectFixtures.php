<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Repositry\UserRepositry;
use App\Entity\Project;
use App\Entity\User;
use App\Entity\Tag;

class ProjectFuxtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $userRepositry = new UserRepository();
        $project = new Project();
        $project.setName('Bug tracker');
        $project.setDescription('A bug tracker application for project managers, developers and clients.');
        $project.setOwner($userRepositry.findBy(['email' => 'asselman.karel@gmail.com']));

        $phpTag = new Tag();
        $phpTag.setName('php');
        $htmlTag = new Tag();
        $htmlTag.setName('html');
        $cssTag = new Tag();
        $cssTag.setName('css');

        $project.addTag($phpTag);
        $project.addTag($htmlTag);
        $project.addTag($cssTag);


        $manager->persist($phpTag);
        $manager->persist($htmlTag);
        $manager->persist($cssTag);
        $manager->persist($project);

        $manager->flush();
    }
}
