<?php

namespace Kanboard\Plugin\Coverimage\Model;

use Kanboard\Model\TaskFileModel;

class CoverimageModel extends TaskFileModel {

    public function setCoverimage($task_id, $image_id) {

        $this->taskMetadataModel->save($task_id, array('coverimage' => $image_id));
    }

    public function removeCoverimage($task_id) {

        $this->taskMetadataModel->remove($task_id, 'coverimage');
    }

    public function getCoverimage($task_id) {

        $id = $this->taskMetadataModel->get($task_id, 'coverimage');
        if (!$id)
          return(null);
        return $this->getById($id);
    }

}
