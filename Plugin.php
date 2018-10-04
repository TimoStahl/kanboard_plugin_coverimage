<?php

namespace Kanboard\Plugin\Coverimage;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Translator;

class Plugin extends Base {

    public function initialize() {
        //Task Details
        $this->template->setTemplateOverride('task_file/images', 'coverimage:task_file/images');
        $this->template->setTemplateOverride('project_overview/images', 'coverimage:project_overview/images');
        $this->template->setTemplateOverride('dashboard/overview', 'coverimage:dashboard/overview');

        //Board
        $this->hook->on('template:layout:css', array('template' => 'plugins/Coverimage/assets/css/board.css'));
        $this->template->hook->attach('template:board:private:task:after-title', 'coverimage:board/task');
    }

    public function onStartup() {
        // Translation
        Translator::load($this->languageModel->getCurrentLanguage(), __DIR__ . '/Locale');
    }

    public function getClasses() {
        return [
            'Plugin\Coverimage\Model' => [
                'CoverimageModel',
            ],
            'Plugin\Coverimage\Model' => [
                'ProjectCoverimageModel',
            ],
        ];
        
    }

    public function getPluginName() {
        return 'Coverimage';
    }

    public function getPluginDescription() {
        return t('Coverimage Function');
    }

    public function getPluginAuthor() {
        return 'BlueTeck';
    }

    public function getPluginVersion() {
        return '1.0.38.0';
    }

    public function getPluginHomepage() {
        return 'https://github.com/BlueTeck/kanboard_plugin_coverimage';
    }

}
