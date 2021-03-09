<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Entity\Project;

class ProjectEntityTest extends TestCase
{
    /** @test */
    public function it_should_create_a_project_with_name_and_description(): void
    {
        $project =  new Project("name", "This is a description");

        $this->assertEquals("name", $project->getName());
        $this->assertEquals("This is a description", $project->getDescription());
    }

    /** @test */
    public function it_should_thow_ArgumentCountError_if_name_and_description_are_missing(): void
    {
        $this->expectException(\ArgumentCountError::class);
        $project = new Project();
    }

    /** @test */
    public function it_should_thow_ArgumentCountError_if_name_or_description_are_missing(): void
    {
        $this->expectException(\ArgumentCountError::class);
        $project = new Project("name");
    }
}
