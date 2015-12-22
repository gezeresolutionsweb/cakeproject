<?php $this->assign('title', __d('project', 'Manage project task comments')); ?>

<?php echo $this->TableNavbar->show( array(
    'actions' => array(
        $this->Html->linkButton(
            __d('energy', 'New provider'),
            ['action' => 'add'],
            ['ga_type' => GA_PRIMARY, 'ga_icon' => 'plus']
        )
    ),
    'search' => true
) ); ?>


<div class="row-fluid">
    <div class="span12">
        <div class="dynamic-content">
            <?php echo $this->element( 'Energy.providers-table-loop', array( 'providers', $providers ) ); ?>
        </div> <!-- .dynamic-content -->

        <div class="dynamic-pagination">
            <?php echo $this->element( 'pagination' ); ?>
        </div>

    </div> <!-- .span12 -->
</div> <!-- .row -->
