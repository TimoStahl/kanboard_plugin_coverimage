<?php

namespace Kanboard\Plugin\Coverimage\Model;

use Kanboard\Model\Base;

class Coverimage extends Base
{
    public function setCoverimage($task_id, $image_id){
        
        $this->taskMetadata->save($task_id, ['coverimage' => $image_id]);
        
    }
    
    public function removeCoverimage($task_id){
        
        $this->taskMetadata->remove($task_id, 'coverimage');
        
    }
    
    public function getCoverimage($task_id){
        
        return $this->taskMetadata->get($task_id, 'coverimage');
        
    }
}
