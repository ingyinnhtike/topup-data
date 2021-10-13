<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class TableController extends Controller
{
    /**
     * Create dynamic table along with dynamic fields
     *
     * @param       $table_name
     * @param array $fields
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function createTable($table_name, $fields = [])
    {
        Schema::table($table_name, function (Blueprint $table) use ($fields, $table_name) {

            if (count($fields) > 0) {
                foreach ($fields as $field) {
                    $table->{$field['type']}($field['name']);
                }
            }

        });

        return response()->json(['message' => 'Given table has been successfully created!'], 200);

    }

    public function operate()
    {
        // set dynamic table name according to your requirements

        $table_name = 'orders';

        // set your dynamic fields (you can fetch this data from database this is just an example)
        $fields = [

            ['name' => 'field_1', 'type' => 'string'],
            ['name' => 'field_2', 'type' => 'text'],
            ['name' => 'field_3', 'type' => 'integer'],
            ['name' => 'field_4', 'type' => 'longText']
        ];

        return $this->createTable($table_name, $fields);
    }

    /**
     * To delete the tabel from the database
     *
     * @param $table_name
     *
     * @return bool
     */
    public function removeTable($table_name)
    {
        Schema::dropIfExists($table_name);

        return true;
    }
}
