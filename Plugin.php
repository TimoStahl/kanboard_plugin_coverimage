<?php

namespace Kanboard\Plugin\Coverimage;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Translator;

class Plugin extends Base
{
    public function initialize()
    {
        //Task Details
        $this->template->setTemplateOverride('task_file/images', 'coverimage:task_file/images'); 
        
        //Board
        $this->hook->on('template:layout:css', 'plugins/Coverimage/assets/css/board.css');
        $this->template->hook->attach('template:board:private:task:after-title', 'coverimage:board/task');
        
        // Translation
        $this->on('app.bootstrap', function($container) {
            Translator::load($container['config']->getCurrentLanguage(), __DIR__.'/Locale');
        });
        
    }

    public function getClasses()
    {
        return array(
            'Plugin\Coverimage\Model' => array(
                'Coverimage',
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
        return 'BlueTeck';
    }
    public function getPluginVersion()
    {
        return '0.1.0';
    }
    public function getPluginHomepage()
    {
        return 'https://github.com/BlueTeck/kanboard_plugin_coverimage';
    }
}