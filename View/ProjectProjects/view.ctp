<?php $this->assign('title', __d('project', 'View a project' )); ?>

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
            ['action' => 'edit', $project[ 'ProjectProject' ][ 'id' ], 'view'],
            ['ga_icon' => 'pencil']
        ),
        $this->Html->linkButton(
            __d( 'project', 'Delete' ),
            ['action' => 'delete', $project[ 'ProjectProject' ][ 'id' ]],
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

        <div class="span12">
                <div class="row-fluid">
                    <div class="span12">
                        <?php echo $this->Html->h3($project['ProjectProject']['title']); ?>

                        <?php if( !empty( $project[ 'ProjectProject' ][ 'description' ] ) ): ?>
                            <p><?php echo $project[ 'ProjectProject' ][ 'description' ]; ?></p>
                        <?php endif; ?>
                    </div>
                </div>

        </div> <!-- .span12 -->
    </div> <!-- row-fluid -->

    <div class="row-fluid">
        <div class="span12">

        <ul class="nav nav-tabs">
            <li class="active"><a href="#project" data-toggle="tab"><?php echo $this->Html->icon( 'list' ); ?> <?php echo __d( 'project', 'Project' ); ?></a></li>
            <li><a href="#tasks" data-toggle="tab"><?php echo $this->Html->icon( 'list' ); ?> <?php echo __d( 'project', 'Tasks' ); ?></a></li>
            <li><a href="#milestones" data-toggle="tab"><?php echo $this->Html->icon( 'globe' ); ?> <?php echo __d( 'project', 'Milestones' ); ?></a></li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane active" id="project">
                <table class="table table-condensed table-hover">
                    <tbody>
                        <tr>
                            <th><?php echo __d( 'project', 'Id' ); ?></th>
                            <td><?php echo $project[ 'ProjectProject' ][ 'id' ]; ?></td>
                        </tr>
                        <?php if( !empty( $project[ 'ParentProject' ][ 'title' ] ) ): ?>
                            <tr>
                                <th><?php echo __d( 'project', 'Parent project' ); ?></th>
                                <td><?php echo $project[ 'ParentProject' ][ 'title' ]; ?></td>
                            </tr>
                        <?php endif; ?>
                        <tr>
                            <th><?php echo __d( 'project', 'Title' ); ?></th>
                            <td><?php echo $project[ 'ProjectProject' ][ 'title' ]; ?></td>
                        </tr>
                        <tr>
                            <th><?php echo __d( 'project', 'Description' ); ?></th>
                            <td><?php echo $project[ 'ProjectProject' ][ 'description' ]; ?></td>
                        </tr>
                        <tr>
                            <th><?php echo __d( 'project', 'Created' ); ?></th>
                            <td><?php echo $project[ 'ProjectProject' ][ 'created' ]; ?></td>
                        </tr>
                        <tr>
                            <th><?php echo __d( 'project', 'Modified' ); ?></th>
                            <td><?php echo $project[ 'ProjectProject' ][ 'modified' ]; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div> <!-- #project -->


            <div class="tab-pane" id="tasks">
                <?php if( !empty( $project[ 'ProjectTask' ] ) ): ?>
                    <table class="table table-striped table-condensed table-hover">    
                    <thead>
                        <tr>
                            <th><?php echo __d( 'project', 'Title' ); ?></th>
                            <th><?php echo __d( 'project', 'Author' ); ?></th>
                            <th><?php echo __d( 'project', 'Assigned to' ); ?></th>
                            <th><?php echo __d( 'project', 'Due date' ); ?></th>
                            <th><?php echo __d( 'project', 'Estimated hours' ); ?></th>
                            <th><?php echo __d( 'project', 'Done ratio' ); ?></th>
                            <th><?php echo __d( 'project', 'Milestone' ); ?></th>
                            <th><?php echo __d( 'project', 'Category' ); ?></th>
                            <th><?php echo __d( 'project', 'Status' ); ?></th>
                            <th><?php echo __d( 'project', 'Priority' ); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach( $project[ 'ProjectTask' ] as $task ): ?>
                        <tr>
                            <td><?php echo $task[ 'title' ]; ?></td>
                            <td><?php echo ( !empty( $task[ 'Author' ][ 'nom_full' ] ) ) ? $task[ 'Author' ][ 'nom_full' ] : ''; ?></td>
                            <td><?php echo ( !empty( $task[ 'AssignedTo' ][ 'nom_full' ] ) ) ? $task[ 'AssignedTo' ][ 'nom_full' ] : ''; ?></td>
                            <td><?php echo ( !empty( $task[ 'due_date' ] ) && $task[ 'due_date' ] !== '0000-00-00' ) ? $task[ 'due_date' ] : ''; ?></td>
                            <td><?php echo $task[ 'estimated_hours' ]; ?></td>
                            <td><?php echo $task[ 'done_ratio' ]; ?></td>
                            <td><?php echo ( !empty( $task[ 'ProjectMilestone' ][ 'title' ] ) ) ? $task[ 'ProjectMilestone' ][ 'title' ] : ''; ?></td>
                            <td><?php echo ( !empty( $task[ 'ProjectTaskCategory' ][ 'title' ] ) ) ? $task[ 'ProjectTaskCategory' ][ 'title' ] : ''; ?></td>
                            <td><?php echo ( !empty( $task[ 'ProjectTaskStatus' ][ 'title' ] ) ) ? $task[ 'ProjectTaskStatus' ][ 'title' ] : ''; ?></td>
                            <td><?php echo ( !empty( $task[ 'ProjectTaskPriority' ][ 'title' ] ) ) ? $task[ 'ProjectTaskPriority' ][ 'title' ] : ''; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                    </table>
                <?php else: ?>
                    <?php echo __d( 'project', 'No tasks found !' ); ?>
                <?php endif; ?>
            </div> <!-- tab-pane -->
            <div class="tab-pane" id="milestones">
                <?php if( !empty( $project[ 'ProjectMilestone' ] ) ): ?>
                    <table class="table table-striped table-condensed table-hover">
                        <thead>
                            <tr>
                                <th><?php echo __d( 'project', 'Title' ); ?></th>
                                <th><?php echo __d( 'project', 'Description' ); ?></th>
                                <th><?php echo __d( 'project', 'Created' ); ?></th>
                                <th><?php echo __d( 'project', 'Effective date' ); ?></th>
                                <th><?php echo __d( 'project', 'Is active' ); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach( $project[ 'ProjectMilestone' ] as $milestone ): ?>
                                <tr>
                                <td><?php echo $milestone[ 'title' ]; ?></td>
                                <td><?php echo $milestone[ 'description' ]; ?></td>
                                <td><?php echo $milestone[ 'created' ]; ?></td>
                                <td><?php echo $milestone[ 'effective_date' ]; ?></td>
                                <td><?php echo $milestone[ 'is_active' ]; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <?php echo __d( 'project', 'No milestone found !' ); ?>
                <?php endif; ?>
            </div> <!-- tab-pane -->
        </div> <!-- .tab-content -->

        </div> <!-- .span12 -->
    </div> <!-- .row -->
            </div> <!-- .well -->
<?php else: ?>
    <p><?php echo __d( 'project', 'Project not found !' ); ?></p>
            </div> <!-- .well -->
<?php endif; ?>
