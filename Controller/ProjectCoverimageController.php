<?php

namespace Kanboard\Plugin\Coverimage\Controller;

use Kanboard\Controller\BaseController;

/**
 * Coverimage
 *
 * @package controller
 * @author  creecros
 */
class ProjectCoverimageController extends BaseController {

    public function set() {
        $project = $this->getProject();
        $file = $this->getFile();

        $this->projectCoverimageModel->setCoverimage($project['id'], $file['id']);

        $this->flash->success(t('Coverimage set.'));

        $this->response->redirect($this->helper->url->to('ProjectOverviewController', 'show', array('project_id' => $project['id'])), true);
    }

    public function remove() {
        $project = $this->getProject();
        $file = $this->getFile();

        $this->projectCoverimageModel->removeCoverimage($project['id']);

        $this->flash->success(t('Coverimage removed.'));

        $this->response->redirect($this->helper->url->to('ProjectOverviewController', 'show', array('project_id' => $project['id'])), true);
    }

}
