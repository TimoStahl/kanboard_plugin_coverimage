<br>
<?php
//$cover_id = 1;
$cover_id = $this->container['coverimage']->getCoverimage($task['id']);
if($cover_id > 0){
    $file = $this->container['file']->getById($cover_id);
    ?>
    <img src="<?= $this->url->href('FileViewer', 'thumbnail', array('file_id' => $file['id'], 'project_id' => $task['project_id'], 'task_id' => $task['id'])) ?>" title="<?= $this->text->e($file['name']) ?>" alt="<?= $this->text->e($file['name']) ?>
    <?php
}
?>
