<?php
$coverimage = $this->task->projectCoverimageModel->getCoverimage($project['id']);
?>
<li>
    <i class="fa fa-newspaper-o fa-fw"></i>
    <?php if (isset($coverimage) && $file['id'] == $coverimage['id']) { ?>
        <?= $this->url->link(t('Remove coverimage'), 'ProjectCoverimageController', 'remove', array('plugin' => 'coverimage', 'project_id' => $project['id'], 'file_id' => $file['id'])) ?>
    <?php } else { ?>
        <?= $this->url->link(t('Set as coverimage'), 'ProjectCoverimageController', 'set', array('plugin' => 'coverimage', 'project_id' => $project['id'], 'file_id' => $file['id'])) ?>
    <?php } ?>
</li>