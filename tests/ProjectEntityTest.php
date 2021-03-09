<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

class ProjectEntityTest extends TestCase
{
    /** @test */
    public function it_should_create_a_project_with_name_and_description(): void
    {
        $project =  new Project("name", "This is a description");

        $this->assertEquals("name", $project->getName());
        $this->assertEquals("This is a description", $project->getDescription());
    }
}
