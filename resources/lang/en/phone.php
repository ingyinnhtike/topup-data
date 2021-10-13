<?php
/**
 * Created by PhpStorm.
 * User: nyinyilwin
 * Date: 5/30/17
 * Time: 12:55 PM
 */

return [
    'title' => 'Phone',
    'management' => 'Phone Management',
    'edit' => 'Edit Phone',
    'add'   => 'Add New Phone',
    'list'      => 'Phone List',
    'create' => 'Create Phone',
    'view' => 'Phone Details',

    'button' => [
        'add'   => 'Add New Phone',
    ],

    'table' => [
        'name'      => 'Phone Number',
        'price'     => 'Price',
        'enabled'   => 'Enabled'
    ],

    'attributes' => [
        'name'      => 'Phone Number',
        'parent_id'     => 'Parent Phone',
        'active'   => 'Is Active',
        'url' => 'Url'
    ],

    'alerts' => [
        'created' => 'The phone was successfully created.',
        'deleted' => 'The phone was successfully deleted.',
        'updated' => 'The phone was successfully updated.',
        'enabled' => 'The phone was successfully enabled.'
    ],
    'exceptions' => [
        'already_exists'    => 'That phone already exists. Please choose a different name.',
        'create_error'      => 'There was a problem creating this phone. Please try again.',
        'delete_error'      => 'There was a problem deleting this phone. Please try again.',
        'not_found'         => 'That phone does not exist.',
        'update_error'      => 'There was a problem updating this phone. Please try again.',
    ]
];