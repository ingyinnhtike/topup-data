<?php
/**
 * Created by PhpStorm.
 * User: nyinyilwin
 * Date: 5/8/17
 * Time: 10:58 AM
 */

return [
    'title' => 'Package',
    'management' => 'Package Management',
    'edit' => 'Edit Package',
    'add'   => 'Add New Package',
    'list'      => 'Package List',
    'create' => 'Create Package',
    'view' => 'Package Details',

    'button' => [
        'add'   => 'Add New Package',
    ],

    'table' => [
        'name'      => 'Package Name',
        'price'     => 'Price',
        'enabled'   => 'Enabled'
    ],

    'attributes' => [
        'name'      => 'Package Name',
        'price'     => 'Price',
        'enabled'   => 'Enabled',
        'description' => 'Description',
        'number_of_sms' => 'Number Of SMS',
        'phone_per_price' => 'Phone Per Price',
        'extra' => [
            'name' => 'Extra Item Name',
            'qty'  => 'Qty'
        ]
    ],

    'alerts' => [
        'created' => 'The package was successfully created.',
        'deleted' => 'The package was successfully deleted.',
        'updated' => 'The package was successfully updated.',
        'enabled' => 'The package was successfully enabled.'
    ],
    'exceptions' => [
        'already_exists'    => 'That package already exists. Please choose a different name.',
        'create_error'      => 'There was a problem creating this package. Please try again.',
        'delete_error'      => 'There was a problem deleting this package. Please try again.',
        'not_found'         => 'That package does not exist.',
        'update_error'      => 'There was a problem updating this package. Please try again.',
    ]
];