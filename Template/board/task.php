<?php
$file = $this->task->coverimageModel->getCoverimage($task['id']);
if(isset($file)){
    ?>
    <span class="coverimage">
        <img src="<?= $this->url->href('FileViewerController', 'thumbnail', array('file_id' => $file['id'], 'project_id' => $task['project_id'], 'task_id' => $file['task_id'])) ?>" title="<?= $this->text->e($file['name']) ?>" alt="<?= $this->text->e($file['name']) ?>">    
    </span>
    <?php
}
?>

