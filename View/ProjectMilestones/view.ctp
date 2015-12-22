<?php $this->assign('title', __d('project', 'Project')); ?>

<?php if( !empty( $project ) ): ?>

<div class="row-fluid">
<?php echo $this->TableNavbar->show( array(
    'actions' => array(
        $this->Html->linkButton(
            __d('project', 'Return to list'),
            ['action' => 'index'],
            ['ga_type' => GA_PRIMARY, 'ga_icon' => 'list']
        ),
        $this->Html->linkButton(
            __d('project', 'Edit'),
            ['action' => 'edit', $project['ProjectProject']['id'], 'view'],
            ['ga_icon' => 'pencil']
        ),
        $this->Html->linkButton(
            __d('project', 'Delete'),
            ['action' => 'delete', $project['ProjectProject']['id']],
            ['ga_icon' => 'times', 'confirm' => __d('project', 'Delete this project ?')]
        ),
        $this->Html->linkButton(
            __d('project', 'New project'),
            ['action' => 'add'],
            ['ga_icon' => 'plus']
        )
    )    	
) ); ?>

</div> <!-- .row-fluid -->

            <div class="well">
    <div class="row-fluid">

        <div class="span3">
                <div class="row-fluid">
                    <div class="span12">
                        <?php echo $this->Html->h3($project['ProjectProject']['title']); ?>
                        <?php if( !empty( $project[ 'ProjectProject' ][ 'description' ] ) ): ?>
                            <p><?php echo $project[ 'ProjectProject' ][ 'description' ]; ?></p>
                        <?php else: ?>
                            <p><?php echo __d( 'project', 'No description for this project.' ); ?></p>
                        <?php endif; ?>
                    </div>
                </div>

        </div> <!-- .span3 -->

        <div class="span9">

        <ul class="nav nav-tabs">
            <li class="active"><a href="#tasks" data-toggle="tab"><?php echo $this->Html->icon( 'list' ); ?> <?php echo __d( 'project', 'Tasks' ); ?></a></li>
            <li><a href="#milestones" data-toggle="tab"><?php echo $this->Html->icon( 'globe' ); ?> <?php echo __d( 'project', 'Milestones' ); ?></a></li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane active" id="tasks">
                    Task list...
            </div> <!-- tab-pane -->
            <div class="tab-pane" id="milestones">
                milestone list...
            </div> <!-- tab-pane -->
        </div> <!-- .tab-content -->

        </div> <!-- .span9 -->
    </div> <!-- .row -->
            </div> <!-- .well -->
<?php else: ?>
    <p><?php echo __d( 'project', 'Project not found !' ); ?></p>
            </div> <!-- .well -->
<?php endif; ?>
