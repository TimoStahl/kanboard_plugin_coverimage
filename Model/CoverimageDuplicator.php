<?php

namespace Kanboard\Plugin\Coverimage\Model;

use Kanboard\Model\TaskDuplicationModel;

/**
 * CoverimageDuplicator Model
 * Extends Task Duplication Model to duplicate metadata
 *
 * @package  Kanboard\Plugin\Coverimage\Model
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
        
        $file = $this->coverimageModel->getCoverimage($task_id);
        $file_id = $this->taskFileModel->create($new_task_id, $file['name'], $file['path'], $file['size']);
        $this->coverimageModel->setCoverimage($new_task_id, $file_id);

        return $new_task_id;
        
    }

}
