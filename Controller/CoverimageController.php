<?php

namespace Kanboard\Plugin\Coverimage\Controller;

use Kanboard\Controller\BaseController;

/**
 * Coverimage
 *
 * @package controller
 * @author  BlueTeck
 */
class CoverimageController extends BaseController {

    public function set() {
        $project = $this->getProject();
        $task = $this->getTask();
        $file = $this->getFile();

        $this->coverimageModel->setCoverimage($task['id'], $file['id']);

        $this->flash->success(t('Coverimage set.'));

        $this->response->redirect($this->helper->url->to('TaskViewController', 'show', array('task_id' => $task['id'], 'project_id' => $task['project_id'])), true);
    }

    public function remove() {
        $project = $this->getProject();
        $task = $this->getTask();
        $file = $this->getFile();

        $this->coverimageModel->removeCoverimage($task['id']);

        $this->flash->success(t('Coverimage removed.'));

        $this->response->redirect($this->helper->url->to('TaskViewController', 'show', array('task_id' => $task['id'], 'project_id' => $task['project_id'])), true);
    }

}
