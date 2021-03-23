<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use App\DataFixtures\UserFixtures;
use App\DataFixtures\TagFixtures;
use App\Entity\Project;
use App\Entity\User;
use App\Entity\Tag;

class ProjectFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $project = new Project('Bug tracker', 'A bug tracker application for project managers, developers and clients.');
        $project->setOwner($this->getReference(UserFixtures::USER_REFERENCE));

        $project->addTag($this->getReference(TagFixtures::PHP_REF));
        $project->addTag($this->getReference(TagFixtures::HTML_REF));
        $project->addTag($this->getReference(TagFixtures::CSS_REF));

        $manager->persist($project);
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class,
            TagFixtures::class
        ];
    }
}
