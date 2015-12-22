<?php $this->assign('title', __d('project', 'Project')); ?>

<?php if( isset( $building ) && !empty( $building ) ): ?>

<div class="row-fluid">
<?php 

$actions = array(
    $this->Html->linkButton(
        __d('energy', 'Return to list'),
        ['action' => 'index'],
        ['ga_type' => GA_PRIMARY, 'ga_icon' => 'list']
    )
);

if($can_edit) {
    $actions = array_merge($actions, [
        $this->Html->linkButton(
            __d('energy', 'Edit'),
            ['action' => 'edit', $building['EnergyBuilding']['id'], 'view'],
            ['ga_icon' => 'pencil']
        ),
        $this->Html->linkButton(
            __d('energy', 'Delete'),
            ['action' => 'delete', $building['EnergyBuilding']['id']],
            ['ga_icon' => 'times', 'confirm' => __d('project', 'Delete this project task ?')]
        ),
        $this->Html->linkButton(
            __d('energy', 'New building'),
            ['action' => 'add'],
            ['ga_icon' => 'plus']
        )
        ]);    	
}

echo $this->TableNavbar->show( array( 'actions' => $actions ) );
?>

</div> <!-- .row-fluid -->

            <div class="well">
    <div class="row-fluid">

        <div class="span3">
                <div class="row-fluid">
                    <div class="span12">
                <?php $picture = DATA_DIR . 'Energy' . DS . 'buildings' . DS . $building[ 'EnergyBuilding' ][ 'id' ] . '.jpg'; ?>
                <?php if( is_file( $picture ) ): ?>
                    <?php echo $this->Data->image( $picture, array( 'width' => 400, 'height' => 300, 'class' => 'img-rounded span12' ) ); ?>
                <?php else: ?>
                    <?php echo $this->Html->image( 'http://placehold.it/400x300/D40376/ffffff', array( 'class' => 'img-rounded span12', 'width' => 400, 'height' => 300 ) ); ?>
                <?php endif; ?>
                    </div>
                </div>

                <br />
                <br />

                <div class="row-fluid">
                    <div class="span12">
                <?php if( $building[ 'EnergyBuilding' ][ 'postal_code' ] && !empty( $building[ 'EnergyBuilding' ][ 'postal_code' ] ) ): ?>
                    <?php $postalCode = str_replace( ' ', '+', $building[ 'EnergyBuilding' ][ 'postal_code' ] ); ?>
                    <iframe class="img-rounded span12 maps" width="400" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.ca/maps?q=<?php echo $postalCode; ?>&amp;output=embed"></iframe>
                <?php endif; ?>
                    </div>
                </div>

        </div> <!-- .span3 -->

        <div class="span9">

        <ul class="nav nav-tabs">
            <li class="active"><a href="#characteristics" data-toggle="tab"><?php echo $this->Html->icon( 'list' ); ?> <?php echo __d( 'energy', 'Characteristics' ); ?></a></li>
            <li><a href="#localization" data-toggle="tab"><?php echo $this->Html->icon( 'globe' ); ?> <?php echo __d( 'energy', 'Localization' ); ?></a></li>
            <li><a href="#meters" data-toggle="tab"><?php echo $this->Html->icon( 'dashboard' ); ?> <?php echo __d( 'energy', 'Meters' ); ?></a></li>
            <li><a href="#areas" data-toggle="tab"><?php echo $this->Html->icon( 'external-link' ); ?> <?php echo __d( 'energy', 'Areas' ); ?></a></li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane active" id="characteristics">
                <table class="table table-condensed">
                <tbody>
                <tr>
                    <th><?php echo __d( 'energy', 'Building number' ); ?></th>
                    <td><?php echo $building[ 'EnergyBuilding' ][ 'building_number' ]; ?></td>
                </tr>
                <tr>
                    <th><?php echo __d( 'energy', 'Common name' ); ?></th>
                    <td><?php echo $building[ 'EnergyBuilding' ][ 'common_name' ]; ?></td>
                </tr>
                <tr>
                    <th><?php echo __d( 'energy', 'Type' ); ?></th>
                    <td><?php echo $building[ 'EnergyBuildingType' ][ 'name' ]; ?></td>
                </tr>
                <tr>
                    <th><?php echo __d( 'energy', 'Funding entity' ); ?></th>
                    <td><?php echo $building[ 'EnergyBuilding' ][ 'funding_entity' ]; ?></td>
                </tr>                
                <tr>
                    <th><?php echo __d( 'energy', 'Area' ); ?></th>
                    <td><?php echo $building[ 'EnergyBuilding' ][ 'area' ]; ?> <?php echo __d( 'energy', 'sq. ft.' ); ?></td>
                </tr>
                <tr>
                    <th><?php echo __d( 'energy', 'Report area' ); ?></th>
                    <td><?php echo $building[ 'EnergyBuilding' ][ 'report_area' ]; ?> <?php echo __d( 'energy', 'sq. ft.' ); ?></td>
                </tr>
                <tr>
                    <th><?php echo __d( 'energy', 'Floors' ); ?></th>
                    <td><?php echo $building[ 'EnergyBuilding' ][ 'floors' ]; ?></td>
                </tr>
                <tr>
                    <th><?php echo __d( 'energy', 'Note' ); ?></th>
                    <td><?php echo nl2br( $building[ 'EnergyBuilding' ][ 'note' ] ); ?></td>
                </tr>
                </tbody>
                </table>
            </div> <!-- tab-pane -->
            <div class="tab-pane" id="localization">
                <table class="table table-condensed">
                <tbody>
                <tr>
                    <th><?php echo __d( 'energy', 'Region' ); ?></th>
                    <td><?php echo $building[ 'EnergyBuildingRegion' ][ 'name' ]; ?></td>
                </tr>
                <tr>
                <tr>
                    <th><?php echo __d( 'energy', 'Address' ); ?></th>
                    <td><?php echo $building[ 'EnergyBuilding' ][ 'address' ]; ?></td>
                </tr>
                <tr>
                    <th><?php echo __d( 'energy', 'City' ); ?></th>
                    <td><?php echo $building[ 'EnergyBuilding' ][ 'city' ]; ?></td>
                </tr>
                <tr>
                    <th><?php echo __d( 'energy', 'State' ); ?></th>
                    <td><?php echo $building[ 'EnergyBuilding' ][ 'state' ]; ?></td>
                </tr>
                <tr>
                    <th><?php echo __d( 'energy', 'Postal code' ); ?></th>
                    <td><?php echo $building[ 'EnergyBuilding' ][ 'postal_code' ]; ?></td>
                </tr>
                <tr>
                    <th><?php echo __d( 'energy', 'Country' ); ?></th>
                    <td><?php echo $building[ 'EnergyBuilding' ][ 'country' ]; ?></td>
                </tr>
                </tbody>
                </table>
            </div> <!-- tab-pane -->
            <div class="tab-pane" id="meters">
                <table class="table table-condensed">
                <thead>
                    <th><?php echo __d( 'energy', 'Meter number' ); ?></th>
                    <th><?php echo __d( 'energy', 'Short description' ); ?></th>
                    <th><span class="pull-right">&nbsp;</span></th>
                </thead>
                <tbody>
                <?php foreach( $building[ 'EnergyMeter' ] as $meter ): ?>
                <tr>
                <td><?php echo $this->Html->link(
                    $meter[ 'meter_number' ],
                    array( 'controller' => 'energy_meters', 'action' => 'view', $meter[ 'id' ] ),
                    array()
                ); ?></td>
                    <td><?php echo $meter[ 'short_description' ]; ?></td>
                    <td><span class="pull-right">
                        <?php echo $this->Html->linkButton(
                        __d('energy', 'View related invoices'),
                        array(
                            'controller' => 'energy_invoices',
                            'action' => 'index',
                            'FilterByBuilding' => $building['EnergyBuilding']['id'],
                            'FilterByMeter' => $meter['id'],
                            'FilterByFromDate' => '',
                            'FilterByToDate' => '',
                            'search' => ''
                        ),
                        array('ga_type' => GA_PRIMARY, 'ga_icon' => 'file')
                    ); ?></span></td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                </table>
            </div> <!-- tab-pane -->

            <div class="tab-pane" id="areas">
                <table class="table table-condensed">
                <thead>
                    <th><?php echo __d( 'energy', 'Date' ); ?></th>
                    <th><?php echo __d( 'energy', 'Area' ); ?></th>
                    <th><span class="pull-right">&nbsp;</span></th>
                </thead>
                <tbody>
                    <?php foreach( $building['EnergyBuildingArea'] as $ba ): ?>
                    <tr>
                        <td><?php echo $ba['created']; ?></td>
                        <td><?php echo $ba['building_area']; ?></td>
                        <td>&nbsp;</td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                </table>
            </div> <!-- tab-pane -->
        </div>

        </div> <!-- .span9 -->
    </div> <!-- .row -->
            </div> <!-- .well -->
<?php else: ?>
    <p><?php echo __d( 'energy', 'Building not found !' ); ?></p>
<?php endif; ?>
