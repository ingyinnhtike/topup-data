<?php
/**
 * Created by PhpStorm.
 * User: nyinyilwin
 * Date: 5/12/17
 * Time: 12:44 PM
 */

return [
    'title' => 'Menu',
    'management' => 'Menu Management',
    'edit' => 'Edit Menu',
    'add'   => 'Add New Menu',
    'list'      => 'Menu List',
    'create' => 'Create Menu',
    'view' => 'Menu Details',

    'button' => [
        'add'   => 'Add New Menu',
    ],

    'table' => [
        'name'      => 'Menu Name',
        'price'     => 'Price',
        'enabled'   => 'Enabled'
    ],

    'attributes' => [
        'name'      => 'Menu Name',
        'parent_id'     => 'Parent Menu',
        'active'   => 'Is Active',
        'url' => 'Url'
    ],

    'alerts' => [
        'created' => 'The menu was successfully created.',
        'deleted' => 'The menu was successfully deleted.',
        'updated' => 'The menu was successfully updated.',
        'enabled' => 'The menu was successfully enabled.'
    ],
    'exceptions' => [
        'already_exists'    => 'That menu already exists. Please choose a different name.',
        'create_error'      => 'There was a problem creating this menu. Please try again.',
        'delete_error'      => 'There was a problem deleting this menu. Please try again.',
        'not_found'         => 'That menu does not exist.',
        'update_error'      => 'There was a problem updating this menu. Please try again.',
    ]
];