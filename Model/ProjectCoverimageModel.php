<?php

namespace Kanboard\Plugin\Coverimage\Model;

use Kanboard\Model\ProjectFileModel;

class ProjectCoverimageModel extends ProjectFileModel {

    public function setCoverimage($project_id, $image_id) {

        $this->projectMetadataModel->save($project_id, array('prjcoverimage' => $image_id));
    }

    public function removeCoverimage($project_id) {

        $this->projectMetadataModel->remove($project_id, 'prjcoverimage');
    }

    public function getCoverimage($project_id) {

        $id = $this->projectMetadataModel->get($project_id, 'prjcoverimage');
        if (!$id)
          return(null);
        return $this->getById($id);
    }

}
