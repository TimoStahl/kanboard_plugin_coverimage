<?php
$coverimage = $this->task->coverimageModel->getCoverimage($task['id']);
?>

<li>
    <i class="fa fa-newspaper-o fa-fw"></i>
    <?php if (isset($coverimage) && $file['id'] == $coverimage['id']) { ?>
        <?= $this->url->link(t('Remove coverimage'), 'CoverimageController', 'remove', array('plugin' => 'coverimage', 'task_id' => $task['id'], 'project_id' => $task['project_id'], 'file_id' => $file['id'])) ?>
    <?php } else { ?>
        <?= $this->url->link(t('Set as coverimage'), 'CoverimageController', 'set', array('plugin' => 'coverimage', 'task_id' => $task['id'], 'project_id' => $task['project_id'], 'file_id' => $file['id'])) ?>
    <?php } ?>
</li>