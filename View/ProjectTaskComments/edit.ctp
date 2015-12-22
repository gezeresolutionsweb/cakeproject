<?php $this->assign('title', __d('project', 'Edit a project task comment')); ?>

<div class="row-fluid">
    <div class="span12">

        <?php echo $this->Form->create( 'EnergyProvider', array(
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
            'EnergyProvider.id' => array(
                'type' => 'hidden'
            ),
            'EnergyProvider.title' => array(
                'label' => array(
                   'text' => __d( 'energy', 'Title' )
                ),
                'after' => '<div class="help-block">' . __d( 'energy', 'Provider name.' ) . '</div>'
            ),
            'EnergyProvider.type' => array(
                'label' => array(
                    'text' => __d( 'energy', 'Provider type' )
                ),
                'type' => 'select',
                'options' => array('owner' => __d( 'energy', 'owner' ), 'provider' => __d( 'energy', 'provider' ) )
            ),
            'EnergyProvider.code_payables' => array(
                'label' => array(
                    'text' => __d( 'energy', 'Payables code' )
                ),
                'after' => '<div class="help-block">' . __d( 'energy', 'Code to be used when processing payables.' ) . '</div>'
            ),
        ) ); ?>
        
        </div> <!-- .well -->


        <?php echo $this->element( 'generic-form-actions' ); ?>
        

        <?php echo $this->Form->end(); ?>

    </div> <!-- .span12 -->
</div> <!-- .row -->
