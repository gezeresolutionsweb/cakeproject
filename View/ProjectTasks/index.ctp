<?php $this->assign('title', __d('project', 'Manage all tasks')); ?>

<?php 
echo $this->TableNavbar->show( array(
    'search' => true,
    'filters' => array(
        'FilterByProject' => array(
            'prepend' => $this->Html->icon('tasks'),
            'empty' => array(0 => __d('project', '-- projects --')),
            'options' => $projects
        ),
        'FilterByCategory' => array(
            'prepend' => $this->Html->icon('tasks'),
            'empty' => array(0 => __d('project', '-- categories --')),
            'options' => $categories
        ),
        'FilterByStatus' => array(
            'prepend' => $this->Html->icon('tag'),
            'empty' => array(0 => __d('project', '-- statuses --')),
            'options' => $statuses
        ),
        'FilterByPriority' => array(
            'prepend' => $this->Html->icon('place'),
            'empty' => array(0 => __d('project', '-- priorities --')),
            'options' => $priorities
        )
    ),
    'actions' => array(
         $this->Html->linkButton(
             __d('project', 'New task'),
             ['action' => 'add', 'FilterByProject' => (!empty($this->request->data['FilterByProject'])) ? $this->request->data[ 'FilterByProject' ] : 1],
             ['ga_type' => GA_PRIMARY, 'ga_icon' => 'plus']
         )
    )
) ); ?>

<div class="row-fluid">
    <div class="span12">
        <div class="dynamic-content">
            <?php echo $this->element( 'Project.tasks-table-loop' ); ?>
        </div> <!-- .dynamic-content -->

        <div class="dynamic-pagination">
            <?php echo $this->element( 'pagination' ); ?>
        </div> <!-- .dynamic-pagination -->
    </div> <!-- .span12 -->
</div> <!-- .row -->
