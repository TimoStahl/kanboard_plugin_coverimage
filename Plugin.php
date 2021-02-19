<?php

namespace Kanboard\Plugin\Coverimage;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Translator;
use Kanboard\Model\TaskDuplicationModel;
use Kanboard\Model\TaskProjectDuplicationModel;
use Kanboard\Plugin\Coverimage\Model\CoverimageDuplicator;
use Kanboard\Plugin\Coverimage\Model\CoverimageProjectDuplicator;
use Kanboard\Core\Security\Role;

class Plugin extends Base
{

    public function initialize()
    {
        //General style
        $this->hook->on('template:layout:css', array('template' => 'plugins/Coverimage/assets/css/board.css'));

        //Task        
        $this->template->hook->attach('template:board:private:task:after-title', 'coverimage:board/task');
        $this->template->hook->attach('template:board:public:task:after-title', 'coverimage:board/task');
        $this->template->hook->attach('template:task-file:images:dropdown', 'coverimage:task_file/images');
        $this->template->hook->attach('template:task-file:images:before-thumbnail-description', 'coverimage:task_file/description');
        
        //Dashboard
        $this->template->hook->attach('template:dashboard:project:before-title', 'coverimage:dashboard/overview');

        //Project
        $this->template->hook->attach('template:project-overview:images:dropdown', 'coverimage:project_overview/images');
        
        //Permissions for public file view   
        $this->applicationAccessMap->add('FileViewerController', array('thumbnail'), Role::APP_PUBLIC);

        //Model extensions
        $this->container['taskDuplicationModel'] = $this->container->factory(function ($c) {
            return new CoverimageDuplicator($c);
        });
        $this->container['taskProjectDuplicationModel'] = $this->container->factory(function ($c) {
            return new CoverimageProjectDuplicator($c);
        });

    }

    public function onStartup()
    {
        // Translation
        Translator::load($this->languageModel->getCurrentLanguage(), __DIR__ . '/Locale');
    }

    public function getClasses()
    {
        return array(
            'Plugin\Coverimage\Model' => array(
                'CoverimageModel',
                'CoverimageDuplicator',
                'CoverimageProjectDuplicator',
                'ProjectCoverimageModel',
            )
        );
    }

    public function getPluginName()
    {
        return 'Coverimage';
    }

    public function getPluginDescription()
    {
        return t('Coverimage Function');
    }

    public function getPluginAuthor()
    {
        return 'BlueTeck + creecros';
    }

    public function getPluginVersion()
    {
        return '1.2.15.0';
    }

    public function getPluginHomepage()
    {
        return 'https://github.com/BlueTeck/kanboard_plugin_coverimage';
    }

    public function getCompatibleVersion()
    {
        return '>=1.2.14';
    }
}
