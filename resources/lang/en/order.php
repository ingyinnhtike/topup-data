<?php
/**
 * Created by PhpStorm.
 * User: nyinyilwin
 * Date: 5/8/17
 * Time: 10:58 AM
 */

return [
    'title' => 'Order',
    'management' => 'Order Management',
    'edit' => 'Edit Order',
    'add'   => 'Add New Order',
    'list'      => 'Order List',
    'create' => 'Create Order',
    'view' => 'Order Details',

    'info' => [
        'package' => 'Package Order List',
        'phone' => 'Phone Number Order List',
    ],

    'button' => [
        'add'   => 'Add New Order',
    ],

    'table' => [
        'package' => [
            'order_id'      => 'Order Id',
            'company'     => 'Company Name',
            'package_name'     => 'Package Name',
            'status'   => 'Status',
            'payment'   => 'Payment',
            'complete' => 'Payment Complete',
            'total' => 'Total',
            'created_at'=> 'Order Created At'
        ],
        'phone' => [
            'order_id'      => 'Order Id',
            'company'     => 'Company Name',
            'numbers_of_phone'     => 'Numbers Of Phone',
            'operator'     => 'Operators',
            'status'   => 'Status',
            'payment'   => 'Payment',
            'complete' => 'Payment Complete',
            'total' => 'Total',
            'created_at'=> 'Order Created At'
        ]
    ],

    'attributes' => [
        'name'      => 'Order Name',
        'price'     => 'Price',
        'enabled'   => 'Enabled',
        'description' => 'Description',
        'number_of_sms' => 'Number Of SMS'
    ],

    'alerts' => [
        'created' => 'The order was successfully created.',
        'deleted' => 'The order was successfully deleted.',
        'updated' => 'The order was successfully updated.',
        'enabled' => 'The order was successfully enabled.'
    ],
    'exceptions' => [
        'already_exists'    => 'That order already exists. Please choose a different name.',
        'create_error'      => 'There was a problem creating this order. Please try again.',
        'delete_error'      => 'There was a problem deleting this order. Please try again.',
        'not_found'         => 'That order does not exist.',
        'update_error'      => 'There was a problem updating this order. Please try again.',
    ]
];