<?php if (! empty($images)): ?>
    <div class="file-thumbnails">
        <?php foreach ($images as $file): ?>
            <div class="file-thumbnail">
                <?= $this->app->component('image-slideshow', array(
                    'images' => $images,
                    'image' => $file,
                    'regex' => 'FILE_ID',
                    'url' => array(
                        'image' => $this->url->to('FileViewerController', 'image', array('file_id' => 'FILE_ID', 'project_id' => $project['id'])),
                        'thumbnail' => $this->url->to('FileViewerController', 'thumbnail', array('file_id' => 'FILE_ID', 'project_id' => $project['id'])),
                        'download' => $this->url->to('FileViewerController', 'download', array('file_id' => 'FILE_ID', 'project_id' => $project['id'])),
                    )
                )) ?>
                <?php 
                   $coverimage = $this->task->projectCoverimageModel->getCoverimage($project['id']);
                 ?>

                <div class="file-thumbnail-content">
                    <div class="file-thumbnail-title">
                        <div class="dropdown">
                            <a href="#" class="dropdown-menu dropdown-menu-link-text"><?= $this->text->e($file['name']) ?> <i class="fa fa-caret-down"></i></a>
                            <ul>
                                <li>
                                    <?= $this->url->icon('external-link', t('View file'), 'FileViewerController', 'image', array('project_id' => $project['id'], 'file_id' => $file['id']), false, '', '', true) ?>
                                </li>
                                <li>
                                    <?= $this->url->icon('download', t('Download'), 'FileViewerController', 'download', array('project_id' => $project['id'], 'file_id' => $file['id'])) ?>
                                </li>
                                <?php if ($this->user->hasProjectAccess('ProjectFileController', 'remove', $project['id'])): ?>
                                    <li>
                                        <?= $this->modal->confirm('trash-o', t('Remove'), 'ProjectFileController', 'confirm', array('project_id' => $project['id'], 'file_id' => $file['id'])) ?>
                                    </li>
                                <?php endif ?>
                                <li>
                                    <i class="fa fa-newspaper-o fa-fw"></i>
                                    <?php if($file['id'] != $coverimage['id']){ ?>
                                        <?= $this->url->link(t('set as coverimage'), 'ProjectCoverimageController', 'set', array('plugin' => 'coverimage', 'project_id' => $project['id'], 'file_id' => $file['id'])) ?>
                                    <?php } else { ?>
                                        <?= $this->url->link(t('remove coverimage'), 'ProjectCoverimageController', 'remove', array('plugin' => 'coverimage', 'project_id' => $project['id'], 'file_id' => $file['id'])) ?>
                                    <?php } ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="file-thumbnail-description">
                        <?= $this->app->tooltipMarkdown(t('Uploaded: %s', $this->dt->datetime($file['date']))."\n\n".t('Size: %s', $this->text->bytes($file['size']))) ?>
                        <?php if (! empty($file['user_id'])): ?>
                            <?= t('Uploaded by %s', $file['user_name'] ?: $file['username']) ?>
                        <?php else: ?>
                            <?= t('Uploaded: %s', $this->dt->datetime($file['date'])) ?>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
<?php endif ?>

