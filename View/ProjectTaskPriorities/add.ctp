<?php $this->assign('title', __d('project', 'New task priorities')); ?>

<div class="row-fluid">
    <div class="span12">

        <?php echo $this->Form->create( 'EnergyMeterType', array(
            'inputDefaults' => array(
                'class' => 'span6',
                'label' => array(
                    'class' => 'control-label'
                ),
                'div' => array(
                    'class' => 'control-group'
                ),
                'between' => '<div class="controls">',
                'after' => '</div>'
            ) ) ); ?>

        <div class="well">
        <?php echo $this->Form->inputs( array(
            'fieldset' => false,
            'legend' => false,
            'title' => array(
                'label' => array(
                    'text' => __d( 'energy', 'Title' )
                ),
                'after' => '<div class="help-block">' . __d( 'energy', 'Meter type name.' ) . '</div></div>'
            ),
        ) ); ?>
        </div> <!-- .well -->


        <?php echo $this->element( 'generic-form-actions' ); ?>

        <?php echo $this->Form->end(); ?>

    </div> <!-- .span12 -->
</div> <!-- .row -->
