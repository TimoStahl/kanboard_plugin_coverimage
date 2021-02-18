<?php

namespace Kanboard\Plugin\Coverimage\Model;

use Kanboard\Model\TaskDuplicationModel;

/**
 * New Task Finder model
 * Extends Group_assign Model
 *
 * @package  Kanboard\Plugin\Group_assign\Model
 */
class CoverimageDuplicator extends TaskDuplicationModel
{
    /**
     * Extended taskDuplicatorModel
     *
     */
    public function duplicate($task_id)
    {
        // add duplicated task functions after duplicated
        $new_task_id = parent::duplicate($task_id);
        
        // duplicate metadata
        if ($new_task_id !== false) {
            $meta = $this->taskMetadataModel->getAll($task_id);
            foreach ($meta as $key => $value) { $this->taskMetadataModel->save($new_task_id, [$key => $value]); }
        }
        

        return $new_task_id;
        
    }

}