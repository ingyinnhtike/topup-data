<?php
/**
 * Created by PhpStorm.
 * User: nyinyilwin
 * Date: 5/16/17
 * Time: 11:11 AM
 */

return [
    'title' => 'Company',
    'management' => 'Company Management',
    'edit' => 'Edit Company',
    'add'   => 'Add New Company',
    'list'      => 'Company List',
    'create' => 'Create Company',
    'view' => 'Company Details',

    'button' => [
        'add'   => 'Add New Company',
    ],

    'table' => [
        'name'      => 'Company Name',
        'address'     => 'Address',
        'phone'     => 'Phone',
        'confirmed'   => 'Confirmed',
        'created_at' => 'Created'
    ],

    'attributes' => [
        'name'      => 'Company Name',
        'parent_id'     => 'Parent Company',
        'active'   => 'Is Active',
        'url' => 'Url'
    ],

    'alerts' => [
        'created' => 'The company was successfully created.',
        'deleted' => 'The company was successfully deleted.',
        'updated' => 'The company was successfully updated.',
        'enabled' => 'The company was successfully enabled.'
    ],
    'exceptions' => [
        'already_exists'    => 'That company already exists. Please choose a different name.',
        'create_error'      => 'There was a problem creating this company. Please try again.',
        'delete_error'      => 'There was a problem deleting this company. Please try again.',
        'not_found'         => 'That company does not exist.',
        'update_error'      => 'There was a problem updating this company. Please try again.',
    ]
];