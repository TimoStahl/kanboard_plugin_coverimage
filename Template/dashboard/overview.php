<?php
$file = $this->task->projectCoverimageModel->getCoverimage($project['id']);
if (isset($file)) {
?>
    <span class="avatar avatar-20 avatar-inline">
        <img src="<?= $this->url->href('FileViewerController', 'thumbnail', array('file_id' => $file['id'], 'project_id' => $project['id'])) ?>" title="<?= $this->text->e($file['name']) ?>" alt="<?= $this->text->e($file['name']) ?>" vspace="5" hspace="3" height="25">
    </span>
<?php
}
?>