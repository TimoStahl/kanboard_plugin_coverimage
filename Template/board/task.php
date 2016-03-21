<?php
$file = $this->task->coverimage->getCoverimage($task['id']);
if(isset($file)){
    ?>
    <span>
    <img src="<?= $this->url->href('FileViewer', 'thumbnail', array('file_id' => $file['id'], 'project_id' => $task['project_id'], 'task_id' => $task['id'])) ?>" title="<?= $this->text->e($file['name']) ?>" alt="<?= $this->text->e($file['name']) ?>">
    </span>
    <?php
}
?>

