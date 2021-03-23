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

        $project2 = new Project('ShopLocally', 'An e-commerce platform for local shopping');
        $project2->setOwner($this->getReference(UserFixtures::USER_REFERENCE));
        $project2->addTag($this->getReference(TagFixtures::RUBY_REF));
        $project2->addTag($this->getReference(TagFixtures::HTML_REF));
        $project2->addTag($this->getReference(TagFixtures::CSS_REF));

        $project3 = new Project('Test project', 'Test project created for presentations');
        $project3->setOwner($this->getReference(UserFixtures::USER_REFERENCE));
        $project3->addTag($this->getReference(TagFixtures::CSHARP_REF));
        $project3->addTag($this->getReference(TagFixtures::HTML_REF));
        $project3->addTag($this->getReference(TagFixtures::CSS_REF));

        $manager->persist($project);
        $manager->persist($project2);
        $manager->persist($project3);

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
