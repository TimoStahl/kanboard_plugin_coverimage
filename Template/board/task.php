<?php
$cover_id = $this->task->coverimage->getCoverimage($task['id']);
if($cover_id > 0){
    $file = $this->task->coverimage->getById($cover_id);
    ?>
    <span>
    <img src="<?= $this->url->href('FileViewer', 'thumbnail', array('file_id' => $file['id'], 'project_id' => $task['project_id'], 'task_id' => $task['id'])) ?>" title="<?= $this->text->e($file['name']) ?>" alt="<?= $this->text->e($file['name']) ?>">
    </span>
    <?php
}
?>

