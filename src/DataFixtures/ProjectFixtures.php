<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use App\DataFixtures\UserFixtures;
use App\Entity\Project;
use App\Entity\User;
use App\Entity\Tag;

class ProjectFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $project = new Project('Bug tracker', 'A bug tracker application for project managers, developers and clients.');
        $project->setOwner($this->getReference(UserFixtures::USER_REFERENCE));

        $phpTag = new Tag();
        $phpTag->setName('php');
        $htmlTag = new Tag();
        $htmlTag->setName('html');
        $cssTag = new Tag();
        $cssTag->setName('css');

        $project->addTag($phpTag);
        $project->addTag($htmlTag);
        $project->addTag($cssTag);


        $manager->persist($phpTag);
        $manager->persist($htmlTag);
        $manager->persist($cssTag);
        $manager->persist($project);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class,
        ];
    }
}
