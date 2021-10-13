<?php
/**
 * Created by PhpStorm.
 * User: nyinyilwin
 * Date: 7/13/17
 * Time: 2:51 PM
 */

return [
    'menu_title' => 'Send Schedule SMS',
    'title' => 'SMS Schedule',
    'management' => 'Schedule Management',
    'edit' => 'Edit Schedule',
    'add'   => 'Add New Schedule',
    'list'      => 'Schedule List',
    'create' => 'Create Schedule',
    'view' => 'Schedule Details',

    'buttons' => [
        'add'   => 'Add New Schedule',
        'add_phone' => 'Add Phone Number'
    ],

    'model' => [
        'add_phone' => 'Add Phone Number',
        'edit_phone' => 'Edit Phone Number',
        'phone' => 'Phone Number',
        'body'  => 'Message Body',
        'title' => 'Message Title',
        'date'  => 'Schedule Date & Time',
        'excel' => 'Excel File ( CSV )'
    ],

    'attributes' => [
        'title' => 'Message Title',
        'date'  => 'Schedule Date',
        'status' => 'Status'
    ],

    'table' => [
        'title'      => 'Message Title',
        'date'      => 'Schedule Date',
        'status'     => 'Status',
        'created_by'   => 'Created By',
        'sms'       => 'Number Of SMS'
    ],

    'contacts' => [
        'table' => [
            'phone'      => 'Phone Number',
            'body'     => 'Text Body'
        ],
    ],

    'alerts' => [
        'created' => 'The schedule was successfully created.',
        'deleted' => 'The schedule was successfully deleted.',
        'updated' => 'The schedule was successfully updated.',
        'enabled' => 'The schedule was successfully enabled.'
    ],

    'exceptions' => [
        'already_exists'    => 'That schedule already exists. Please choose a different name.',
        'create_error'      => 'There was a problem creating this schedule. Please try again.',
        'delete_error'      => 'There was a problem deleting this schedule. Please try again.',
        'not_found'         => 'That schedule does not exist.',
        'update_error'      => 'There was a problem updating this schedule. Please try again.',
    ]
];