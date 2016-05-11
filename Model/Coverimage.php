<?php

namespace Kanboard\Plugin\Coverimage\Model;

use Kanboard\Model\Base;
use Kanboard\Model\TaskFile;

class Coverimage extends TaskFile
{
    public function setCoverimage($task_id, $image_id){
        
        $this->taskMetadata->save($task_id, array('coverimage' => $image_id));
        
    }
    
    public function removeCoverimage($task_id){
        
        $this->taskMetadata->remove($task_id, 'coverimage');
        
    }
    
    public function getCoverimage($task_id){
        
        $id = $this->taskMetadata->get($task_id, 'coverimage');
        return $this->getById($id);
        
    }
}
