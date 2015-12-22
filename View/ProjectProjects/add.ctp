<?php $this->assign('title', __d('project', 'New project' )); ?>

<div class="row-fluid">
    <div class="span12">

        <?php echo $this->Form->create( 'ProjectProject' ); ?>

        <div class="well">
    
                <?php echo $this->Form->input( 'ProjectProject.parent_id', array(
                    'label' => __d( 'project', 'Parent project' ),
                    'options' => $projects,
                    'empty' => array(
                        0 => __d( 'project', '-- projects --' )
                    )
                ) ); ?>

                <?php echo $this->Form->input( 'ProjectProject.title', array(
                    'label' => __d( 'project', 'Title' )
                ) ); ?>

                <?php echo $this->Form->input( 'ProjectProject.description', array(
                    'label' => __d( 'project', 'Description' )
                ) ); ?>
        </div> <!-- .well -->

        <?php echo $this->element( 'generic-form-actions' ); ?>

        <?php echo $this->Form->end(); ?>

    </div> <!-- .span12 -->
</div> <!-- .row-fluid -->
