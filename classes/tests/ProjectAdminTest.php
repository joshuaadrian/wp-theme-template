<?php
class ProjectAdminTest extends PHPUnit_Framework_TestCase
{
    // ...

    public function classExists()
    {
      
        $this->assertFileExists('../ProjectAdmin.php');

    }

    // ...
}