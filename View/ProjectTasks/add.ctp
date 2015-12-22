<?php $this->assign('title', __d('project', 'New task')); ?>

<div class="row-fluid">
    <div class="span12">

        <?php echo $this->Form->create( 'ProjectTask' ); ?>

        <div class="well">


                <div class="row-fluid">
                    <div class="span4">
                <?php echo $this->Form->input( 'ProjectTask.title', array(
                    'label' => __d( 'project', 'Title' ),
                    'type' => 'text'
                ) ); ?>
                <?php echo $this->Form->input( 'ProjectTask.description', array(
                    'label' => __d( 'project', 'Description' ),
                    'type' => 'textarea'
                ) ); ?>

                </div> <!-- .span4 -->


                <div class="span4">
                <?php echo $this->Form->input( 'ProjectTask.project_project_id', array(
                    'label' => __d( 'project', 'Project' ),
                    'options' => $projects,
                    'value' => ( $this->request->params[ 'named' ][ 'FilterByProject' ] ) ? $this->request->params[ 'named' ][ 'FilterByProject' ] : 1,
                    'empty' => array(
                        0 => __d( 'project', '-- projects --' )
                    )
                ) ); ?>
                <?php echo $this->Form->input( 'ProjectTask.project_task_category_id', array(
                    'label' => __d( 'project', 'Category' ),
                    'options' => $categories,
                    'value' => 2,
                    'empty' => array(
                        0 => __d( 'project', '-- categories --' )
                    )
                ) ); ?>


<?php /*
                <?php echo $this->Form->input( 'ProjectTask.assigned_to_id', array(
                    'label' => __d( 'project', 'Assigned to' ),
                    'options' => $colaborators
                ) ); ?>
 */ ?>

                <?php echo $this->Form->input( 'ProjectTask.project_task_priority_id', array(
                    'label' => __d( 'project', 'Priority' ),
                    'options' => $priorities,
                    'value' => 2,
                    'empty' => array(
                        0 => __d( 'project', '-- priorities --' )
                    )
                ) ); ?>
                <?php echo $this->Form->input( 'ProjectTask.project_task_status_id', array(
                    'label' => __d( 'project', 'status' ),
                    'options' => $statuses,
                    'value' => 1,
                    'empty' => array(
                        0 => __d( 'project', '-- statuses --' )
                    )
                ) ); ?>



                </div> <!-- .span4 -->

                
                <div class="span4">
                <?php echo $this->Form->input( 'ProjectTask.due_date', array(
                    'label' => __d( 'project', 'Due date' ),
                    'type' => 'text',
                    'class' => 'datepicker',
                    'value' => date( 'Y-m-d' )
                ) ); ?>
                <?php echo $this->Form->input( 'ProjectTask.estimated_hours', array(
                    'label' => __d( 'project', 'Estimated hours' ),
                    'type' => 'text',
                    'value' => 0.5
                ) ); ?>
                <?php echo $this->Form->input( 'ProjectTask.done_ratio', array(
                    'label' => __d( 'project', 'Done ratio' ),
                    'type' => 'select',
                    'options' => array_combine( range( 0, 100, 10 ), range( 0, 100, 10 ) )
                ) ); ?>

                </div> <!-- .span4 -->
                </div> <!-- .row-fluid -->
        </div> <!-- .well -->

        <?php echo $this->element( 'generic-form-actions' ); ?>

        <?php echo $this->Form->end(); ?>

    </div> <!-- .span12 -->
</div> <!-- .row-fluid -->
