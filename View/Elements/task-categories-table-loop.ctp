<div class="well">
<?php if( !empty( $providers ) ): ?>
    <table class="table table-condensed table-striped">
        <thead>
            <tr>
                <th><?php echo __d( 'energy', 'Provider' ); ?></th>
                <th><?php echo __d( 'energy', 'Provider type' ); ?></th>
                <th></th>
            </tr>
        </thead>
        </tbody>
        <?php foreach( $providers as $provider ): ?>
            <tr>
                <td><?php echo $provider[ 'EnergyProvider' ][ 'title' ]; ?></td>
                <td><?php echo $provider[ 'EnergyProvider' ][ 'type' ]; ?></td>
                <td>
                    <div class="pull-right">
                        <?php echo $this->Html->link(
                            $this->Html->icon('pencil'),
                            ['action' => 'edit', $provider['EnergyProvider']['id']],
                            ['escape' => false, 'title' => __d('energy', 'View')]
                        ); ?>
                        <?php echo $this->Html->link(
                            $this->Html->icon('remove'),
                            ['action' => 'delete', $provider['EnergyProvider']['id']],
                            ['escape' => false, 'title' => __d( 'energy', 'View' ), 'confirm' => __d('project', 'Delete this task category ?')]
                        ); ?>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p><?php echo __d( 'energy', 'No providers found !' ); ?></p>
<?php endif; ?>
</div> <!-- .well -->
