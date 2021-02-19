<?php

namespace Kanboard\Plugin\Coverimage\Model;

use Kanboard\Model\TaskProjectDuplicationModel;
use Kanboard\Model\TaskFileModel;
use Kanboard\Plugin\Coverimage\Model\CoverimageModel;

/**
 * CoverimageDuplicator Model
 * Extends Task Duplication Model to duplicate metadata
 *
 * @package  Kanboard\Plugin\Coverimage\Model
 */
class CoverimageProjectDuplicator extends TaskProjectDuplicationModel
{
    /**
     * Extended taskProjectDuplicationModel
     *
     */
    public function duplicateToProject($task_id, $project_id, $swimlane_id = null, $column_id = null, $category_id = null, $owner_id = null)
    {
        // add duplicated task functions after duplicated
        $new_task_id = parent::duplicateToProject($task_id, $project_id, $swimlane_id, $column_id, $category_id, $owner_id);
        
        // duplicate metadata
        if ($new_task_id !== false) {
            $meta = $this->taskMetadataModel->getAll($task_id);
            foreach ($meta as $key => $value) { $this->taskMetadataModel->save($new_task_id, [$key => $value]); }
        }
        
        $file = $this->coverimageModel->getCoverimage($new_task_id);
        $file_id = $this->taskFileModel->create($new_task_id, $file['name'], $file['path'], $file['size']);
        $this->coverimageModel->setCoverimage($new_task_id, $file_id);
        
        return $new_task_id;
        
    }

}
