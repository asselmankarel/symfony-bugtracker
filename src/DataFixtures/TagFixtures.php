<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Tag;

class TagFixtures extends Fixture
{
    public const PHP_REF = 'php';
    public const HTML_REF = 'html';
    public const CSS_REF = 'css';
    public const JS_REF = 'js';
    public const RUBY_REF = 'ruby';
    public const CSHARP_REF = 'csharp';

    public function load(ObjectManager $manager)
    {
        $phpTag = new Tag();
        $phpTag->setName('php');
        $htmlTag = new Tag();
        $htmlTag->setName('html');
        $cssTag = new Tag();
        $cssTag->setName('css');
        $jsTag = new Tag();
        $jsTag->setName('js');
        $rubyTag = new Tag();
        $rubyTag->setName('ruby');
        $csharpTag = new Tag();
        $csharpTag->setName('csharp');

        $manager->persist($phpTag);
        $manager->persist($htmlTag);
        $manager->persist($cssTag);
        $manager->persist($jsTag);
        $manager->persist($rubyTag);
        $manager->persist($csharpTag);

        $manager->flush();

        $this->addReference(self::PHP_REF, $phpTag);
        $this->addReference(self::HTML_REF, $htmlTag);
        $this->addReference(self::CSS_REF, $cssTag);
        $this->addReference(self::JS_REF, $jsTag);
        $this->addReference(self::RUBY_REF, $rubyTag);
        $this->addReference(self::CSHARP_REF, $csharpTag);
    }
}
