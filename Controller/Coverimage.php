<?php
namespace Kanboard\Plugin\Coverimage\Controller;
use Kanboard\Controller\Base;
/**
 * Coverimage
 *
 * @package controller
 * @author  BlueTeck
 */
class Coverimage extends Base
{
    
    public function set()
    {
        $project = $this->getProject();
        $task = $this->getTask();
        $file = $this->getFile();
        
        $this->coverimage->setCoverimage($task['id'],$file['id']);
        
        //$metadata = $this->taskMetadata->getAll($task['id']);
        //print_r($metadata);
        $this->flash->success(t('Coverimage set.'));
        
        $this->response->redirect($this->helper->url->to('task', 'show', array('task_id' => $task['id'], 'project_id' => $task['project_id'])), true);
        
    }    
    
}