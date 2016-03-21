<?php

namespace Kanboard\Plugin\Coverimage;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Translator;

class Plugin extends Base
{
    public function initialize()
    {
        
        $this->template->setTemplateOverride('task_file/images', 'coverimage:task_file/images'); 
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
        return '1.0.0';
    }
    public function getPluginHomepage()
    {
        return 'https://github.com/BlueTeck/kanboard_plugin_coverimage';
    }
}