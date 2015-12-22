<?php echo $this->AssetCompress->addScript( 'plugin/project/project_projects/index.js', 'project.project_projects.index.min.js' ); ?>

<?php $this->assign('title', __d('project', 'Manage all projects')); ?>

<?php echo $this->TableNavbar->show( array(
    'search' => true,
    'actions' => array(
        $this->Html->linkButton(
            __d('project', 'New project'),
            ['action' => 'add'],
            ['ga_type' => GA_PRIMARY, 'ga_icon' => 'tasks']
        )
    )
) ); ?>

<div class="row-fluid">
    <div class="span12">
        <div class="dynamic-content">
            <?php echo $this->element( 'Project.projects-table-loop' ); ?>
        </div> <!-- .dynamic-content -->

        <div class="dynamic-pagination">
            <?php echo $this->element( 'pagination' ); ?>
        </div> <!-- .dynamic-pagination -->
    </div> <!-- .span12 -->
</div> <!-- .row -->
