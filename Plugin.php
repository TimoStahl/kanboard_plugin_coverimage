<?php

namespace Kanboard\Plugin\Coverimage;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Translator;

class Plugin extends Base
{

    public function initialize()
    {
        //General style
        $this->hook->on('template:layout:css', array('template' => 'plugins/Coverimage/assets/css/board.css'));

        //Task
        $this->template->setTemplateOverride('task_file/images', 'coverimage:task_file/images');
        $this->template->hook->attach('template:board:private:task:after-title', 'coverimage:board/task');

        //Dashboard
        $this->template->setTemplateOverride('dashboard/overview', 'coverimage:dashboard/overview');

        //Project
        $this->template->setTemplateOverride('project_overview/images', 'coverimage:project_overview/images');
        $this->template->setTemplateOverride('project_list/project_title', 'coverimage:project_list/project_title');
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
        return '1.2.5.0';
    }

    public function getPluginHomepage()
    {
        return 'https://github.com/BlueTeck/kanboard_plugin_coverimage';
    }

    public function getCompatibleVersion()
    {
        return '>=1.2.5';
    }
}
