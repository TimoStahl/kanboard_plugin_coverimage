<div>
    <?php
       $file = $this->task->projectCoverimageModel->getCoverimage($project['id']);
         if(isset($file)){
       ?>
       <span class="avatar avatar-20 avatar-inline">
          <img src="<?= $this->url->href('FileViewerController', 'thumbnail', array('file_id' => $file['id'], 'project_id' => $project['id'])) ?>" title="<?= $this->text->e($file['name']) ?>" alt="<?= $this->text->e($file['name']) ?>" vspace="5" hspace="3" height="25">    
       </span>
       <?php
         }
       ?>
    <?php if ($this->user->hasProjectAccess('ProjectViewController', 'show', $project['id'])): ?>
        <?= $this->render('project/dropdown', array('project' => $project)) ?>
    <?php else: ?>
        <strong><?= '#'.$project['id'] ?></strong>
    <?php endif ?>

    <span class="table-list-title <?= $project['is_active'] == 0 ? 'status-closed' : '' ?>">
        <?= $this->url->link($this->text->e($project['name']), 'BoardViewController', 'show', array('project_id' => $project['id'])) ?>
    </span>
</div>
