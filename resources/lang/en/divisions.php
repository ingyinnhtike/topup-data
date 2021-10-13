<?php
/**
 * Created by PhpStorm.
 * User: nyinyilwin
 * Date: 8/17/17
 * Time: 11:36 AM
 */

return [
    'title' => 'Division',
    'management' => 'Division Management',
    'edit' => 'Edit Division',
    'add'   => 'Add New Division',
    'list'      => 'Division List',
    'create' => 'Create Division',
    'view' => 'Division Details',

    'button' => [
        'add'   => 'Add New Division',
    ],

    'table' => [
        'district'      => 'District',
        'township'   => 'Township'
    ],

    'attributes' => [
        'district'      => 'District',
        'township'   => 'Township'
    ],

    'alerts' => [
        'created' => 'The Division was successfully created.',
        'deleted' => 'The Division was successfully deleted.',
        'updated' => 'The Division was successfully updated.',
        'enabled' => 'The Division was successfully enabled.'
    ],

    'exceptions' => [
        'already_exists'    => 'That Division already exists. Please choose a different name.',
        'create_error'      => 'There was a problem creating this Division. Please try again.',
        'delete_error'      => 'There was a problem deleting this Division. Please try again.',
        'not_found'         => 'That Division does not exist.',
        'update_error'      => 'There was a problem updating this Division. Please try again.',
    ]
];