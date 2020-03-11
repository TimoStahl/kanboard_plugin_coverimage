<?php
$coverimage = $this->task->coverimageModel->getCoverimage($task['id']);
?>
<?php
if(isset($coverimage) && $file['id'] == $coverimage['id']){
 echo  '<span class="tooltip" title="'.t('Coverimage').'"><i class="fa fa-newspaper-o"></i></span>';
}
?>