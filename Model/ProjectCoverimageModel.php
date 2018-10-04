<?php

namespace Kanboard\Plugin\Coverimage\Model;

use Kanboard\Model\ProjectFileModel;

class ProjectCoverimageModel extends ProjectFileModel {

    public function setCoverimage($project_id, $image_id) {

        $this->projectMetadataModel->save($project_id, array('coverimage' => $image_id));
    }

    public function removeCoverimage($task_id) {

        $this->projectMetadataModel->remove($project_id, 'coverimage');
    }

    public function getCoverimage($task_id) {

        $id = $this->projectMetadataModel->get($project_id, 'coverimage');
        if (!$id)
          return(null);
        return $this->getById($id);
    }

}
