<?php $this->assign('title', __d('project', 'Manage task priorities')); ?>

<?php echo $this->TableNavbar->show( array(
    'actions' => array(
        $this->Html->linkButton(
            __d('energy', 'New meter type'),
            ['action' => 'add'],
            ['ga_type' => GA_PRIMARY, 'ga_icon' => 'plus']
        )
    )
) ); ?>

<div class="row-fluid">
    <div class="span12">
        <div class="dynamic-content">
            <?php echo $this->element( 'Energy.meter-types-table-loop', array( 'meterTypes' => $meterTypes ) ); ?>
        </div> <!-- .dynamic-content -->

        <div class="dynamic-pagination">
            <?php echo $this->element( 'pagination' ); ?>
        </div>
    </div> <!-- .span12 -->
</div> <!-- .row -->
