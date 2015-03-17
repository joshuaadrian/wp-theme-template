<?php
class ProjectTest extends PHPUnit_Framework_TestCase
{
    // ...

    public function classExists()
    {
      
        $this->assertFileExists('../Project.php');

    }

    // ...
}