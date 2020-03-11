<?php

require_once 'tests/units/Base.php';

use Kanboard\Core\Plugin\Loader;
use Kanboard\Model\ProjectModel;
use Kanboard\Model\TaskModel;

class CoverimageModelTest extends Base
{
    public function setUp()
    {
        parent::setUp();
        $plugin = new Loader($this->container);
        $plugin->scan();
    }
}
