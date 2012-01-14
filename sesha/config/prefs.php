<?php
/**
 * Preferences Information
 * =======================
 * Changes you make to the prefs.local.php file(s) will not be reflected until the
 * user logs out and logs in again.
 *
 * IMPORTANT: DO NOT EDIT THIS FILE!
 * Local overrides MUST be placed in prefs.local.php or prefs.d/.
 * If the 'vhosts' setting has been enabled in Horde's configuration, you can
 * use prefs-servername.php.
 *
 * See horde/config/prefs.php for documentation on the structure of this file.
 */

$prefGroups['display'] = array(
    'column' => _("General Options"),
    'label' => _("Display Options"),
    'desc' => _("Change your inventory sorting and display options."),
    'members' => array('sortby', 'sortdir', 'list_properties', 'sesha_default_view')
);

// user preferred sorting column
$_prefs['sortby'] = array(
    'value' => SESHA_SORT_STOCKID,
    'locked' => false,
    'type' => 'enum',
    'enum' => array(SESHA_SORT_STOCKID => _("Stock ID"),
                    SESHA_SORT_NAME => _("Item Name"),
                    SESHA_SORT_NOTE => _("Note")),
    'desc' => _("Default sorting criteria:")
);

// user preferred sorting direction
$_prefs['sortdir'] = array(
    'value' => SESHA_SORT_ASCEND,
    'locked' => false,
    'type' => 'enum',
    'enum' => array(SESHA_SORT_ASCEND => _("Ascending"),
                    SESHA_SORT_DESCEND => _("Descending")),
    'desc' => _("Default sorting direction:")
);

// default view
$_prefs['sesha_default_view'] = array(
    'value' => 'list',
    'type' => 'enum',
    'enum' => array(
        'list' => _("List"),
        'search' => _("Search"),
        'stock' => _("Stock")
    ),
    'desc' => _("Select the view to display after login:")
);


// properties to show in lists
$_prefs['list_properties'] = array(
    'value' => array(),
    'locked' => false,
    'type' => 'multienum',
    'enum' => array(),
    'desc' => _("Select properties that you would like to see in the list view (all other properties are only shown on individual item screens):")
);
$sesha_driver = $GLOBALS['injector']->getInstance('Sesha_Factory_Driver')->create();
foreach ($sesha_driver->getProperties() as $property) {
    $_prefs['list_properties']['enum'][$property['property_id']] = $property['property'];
}
