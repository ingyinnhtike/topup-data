<?php

use Database\TruncateTable;
use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Database\DisableForeignKeys;
use Illuminate\Support\Facades\DB;

class PackageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           DB::table('packages')->insert([
            [
                "operator" => "MPT",
                "package_name" => "Night Time - 7 Nights",
                "package_code" => "Night_Bolt-ons_1G",
                "volume" => "1GB",
                "price" => "899",
                "created_at"        => Carbon::now(),
                "updated_at"        => Carbon::now(),
           ],
           [
                "operator" => "MPT",
                "package_name" => "Night Time - 30 Nights",
                "package_code" => "Night_Bolt-ons_4G",
                "volume" => "4GB",
                "price" => "3499",
                "created_at"        => Carbon::now(),
                "updated_at"        => Carbon::now(),
           ],
           [
                "operator" => "MPT",
                "package_name" => "30 Days A Kyite Pyaw Plus Onnet Voice Pack",
                "package_code" => "30 Days A Kyite Pyaw Plus Onnet Voice Pack",
                "volume" => "238Mins",
                "price" => "1500",
                "created_at"        => Carbon::now(),
                "updated_at"        => Carbon::now(),
           ],
           [
                "operator" => "MPT",
                "package_name" => "90 Days A Kyite Pyaw Plus Onnet Voice Pack",
                "package_code" => "90 Days A Kyite Pyaw Plus Onnet Voice Pack",
                "volume" => "619Mins",
                "price" => "3900",
                "created_at"        => Carbon::now(),
                "updated_at"        => Carbon::now(),
           ],
           [
                "operator" => "MPT",
                "package_name" => "7 Days A Kyite Pyaw Plus Onnet Voice Pack",
                "package_code" => "7 Days A Kyite Pyaw Plus Onnet Voice Pack",
                "volume" => "135Mins",
                "price" => "850",
                "created_at"        => Carbon::now(),
                "updated_at"        => Carbon::now(),
           ],
           [
                "operator" => "MPT",
                "package_name" => "2000 Ks = 10000 Ks Htaw B (30 days)",
                "package_code" => "Htaw_B_Pack_30Days",
                "volume" => "10000Ks",
                "price" => "2000",
                "created_at"        => Carbon::now(),
                "updated_at"        => Carbon::now(),
           ],
           [
                "operator" => "MPT",
                "package_name" => "1000 Ks = 5000 Ks Htaw B (15 days)",
                "package_code" => "Htaw_B_Pack_15Days",
                "volume" => "5000Ks",
                "price" => "1000",
                "created_at"        => Carbon::now(),
                "updated_at"        => Carbon::now(),
           ],
           [
                "operator" => "MPT",
                "package_name" => "5000 Ks = 25000 Ks Htaw B (60 days)",
                "package_code" => "Htaw_B_Pack_60Days",
                "volume" => "25000Ks",
                "price" => "5000",
                "created_at"        => Carbon::now(),
                "updated_at"        => Carbon::now(),
           ],
           [
                "operator" => "MPT",
                "package_name" => "Data Carry Plus 1180MB",
                "package_code" => "Data Carry Plus 1180MB",
                "volume" => "1180MB",
                "price" => "1299",
                "created_at"        => Carbon::now(),
                "updated_at"        => Carbon::now(),
           ],
           [
                "operator" => "MPT",
                "package_name" => "Data Carry Plus 2450MB",
                "package_code" => "Data Carry Plus 2450MB",
                "volume" => "2450MB",
                "price" => "2699",
                "created_at"        => Carbon::now(),
                "updated_at"        => Carbon::now(),
           ],
           [
                "operator" => "MPT",
                "package_name" => "Data Carry Plus 4100MB",
                "package_code" => "Data Carry Plus 4100MB",
                "volume" => "4100MB",
                "price" => "4499",
                "created_at"        => Carbon::now(),
                "updated_at"        => Carbon::now(),
           ],
           [
                "operator" => "MPT",
                "package_name" => "Data Carry Plus 1630MB",
                "package_code" => "Data Carry Plus 1630MB",
                "volume" => "1630MB",
                "price" => "1799",
                "created_at"        => Carbon::now(),
                "updated_at"        => Carbon::now(),
           ],
           [
                "operator" => "MPT",
                "package_name" => "Data Carry Plus 24500MB",
                "package_code" => "Data Carry Plus 24500MB",
                "volume" => "24500MB",
                "price" => "26999",
                "created_at"        => Carbon::now(),
                "updated_at"        => Carbon::now(),
           ],
           [
                "operator" => "MPT",
                "package_name" => "Data Carry Plus 16400MB",
                "package_code" => "Data Carry Plus 16400MB",
                "volume" => "16400MB",
                "price" => "17999",
                "created_at"        => Carbon::now(),
                "updated_at"        => Carbon::now(),
           ],
           [
                "operator" => "MPT",
                "package_name" => "Data Carry Plus 8200MB",
                "package_code" => "Data Carry Plus 8200MB",
                "volume" => "8200MB",
                "price" => "8999",
                "created_at"        => Carbon::now(),
                "updated_at"        => Carbon::now(),
           ],
           [
                "operator" => "MPT",
                "package_name" => "Data Carry Plus 415MB",
                "package_code" => "Data Carry Plus 415MB",
                "volume" => "415MB",
                "price" => "699",
                "created_at"        => Carbon::now(),
                "updated_at"        => Carbon::now(),
           ],
           [
                "operator" => "MPT",
                "package_name" => "Data Carry Plus 630MB",
                "package_code" => "Data Carry Plus 630MB",
                "volume" => "630MB",
                "price" => "799",
                "created_at"        => Carbon::now(),
                "updated_at"        => Carbon::now(),
           ],
           [
                "operator" => "MPT",
                "package_name" => "Data Carry Plus 905MB",
                "package_code" => "Data Carry Plus 860MB",
                "volume" => "905MB",
                "price" => "999",
                "created_at"        => Carbon::now(),
                "updated_at"        => Carbon::now(),
           ],
           [
                "operator" => "Telenor",
                "package_name" => "Data Suboo",
                "package_code" => "Data Suboo 700MB",
                "volume" => "700MB",
                "price" => "799",
                "created_at"        => Carbon::now(),
                "updated_at"        => Carbon::now(),
           ],
           [
                "operator" => "Telenor",
                "package_name" => "Data Suboo",
                "package_code" => "Data Suboo 925MB",
                "volume" => "925MB",
                "price" => "999",
                "created_at"        => Carbon::now(),
                "updated_at"        => Carbon::now(),
           ],
           [
                "operator" => "Telenor",
                "package_name" => "Data Suboo",
                "package_code" => "Data Suboo 1500MB",
                "volume" => "1500MB",
                "price" => "1,599",
                "created_at"        => Carbon::now(),
                "updated_at"        => Carbon::now(),
           ],
           [
                "operator" => "Telenor",
                "package_name" => "Data Suboo",
                "package_code" => "Data Suboo 2850MB",
                "volume" => "2850MB",
                "price" => "2,999",
                "created_at"        => Carbon::now(),
                "updated_at"        => Carbon::now(),
           ],
           [
                "operator" => "Telenor",
                "package_name" => "Data Suboo",
                "package_code" => "Data Suboo 5700MB",
                "volume" => "5700MB",
                "price" => "5,999",
                "created_at"        => Carbon::now(),
                "updated_at"        => Carbon::now(),
           ],
           [
                "operator" => "Telenor",
                "package_name" => "Data Suboo",
                "package_code" => "Data Suboo 9500MB",
                "volume" => "9500MB",
                "price" => "9,999",
                "created_at"        => Carbon::now(),
                "updated_at"        => Carbon::now(),
           ],
           [
                "operator" => "Telenor",
                "package_name" => "Sate Kyite Pyaw",
                "package_code" => "Sate Kyite Pyaw 90 Mins",
                "volume" => "90 Mins",
                "price" => "499",
                "created_at"        => Carbon::now(),
                "updated_at"        => Carbon::now(),
           ],
           [
                "operator" => "Telenor",
                "package_name" => "Sate Kyite Pyaw",
                "package_code" => "Sate Kyite Pyaw 110 Mins",
                "volume" => "110 Mins",
                "price" => "599",
                "created_at"        => Carbon::now(),
                "updated_at"        => Carbon::now(),
           ],
           [
                "operator" => "Telenor",
                "package_name" => "Sate Kyite Pyaw",
                "package_code" => "Sate Kyite Pyaw 130 Mins",
                "volume" => "130 Mins",
                "price" => "700",
                "created_at"        => Carbon::now(),
                "updated_at"        => Carbon::now(),
           ],
           [
                "operator" => "Telenor",
                "package_name" => "Super Htaw",
                "package_code" => "Super Htaw 6x1000",
                "volume" => "6000 Ks",
                "price" => "1,000",
                "created_at"        => Carbon::now(),
                "updated_at"        => Carbon::now(),
           ],
           [
                "operator" => "Telenor",
                "package_name" => "Super Htaw",
                "package_code" => "Super Htaw 6x2000",
                "volume" => "12000 Ks",
                "price" => "2,000",
                "created_at"        => Carbon::now(),
                "updated_at"        => Carbon::now(),
           ],
           [
                "operator" => "MyTel",
                "package_name" => "Data Pack",
                "package_code" => "500",
                "volume" => "500 MB",
                "price" => "525",
                "created_at"        => Carbon::now(),
                "updated_at"        => Carbon::now(),
           ],
           [
                "operator" => "MyTel",
                "package_name" => "Data Pack",
                "package_code" => "1000",
                "volume" => "1000 MB",
                "price" => "1050",
                "created_at"        => Carbon::now(),
                "updated_at"        => Carbon::now(),
           ],
           [
                "operator" => "MyTel",
                "package_name" => "Data Pack",
                "package_code" => "1500",
                "volume" => "1500 MB",
                "price" => "1575",
                "created_at"        => Carbon::now(),
                "updated_at"        => Carbon::now(),
           ],
           [
                "operator" => "MyTel",
                "package_name" => "Data Pack",
                "package_code" => "2000",
                "volume" => "2000 MB",
                "price" => "2100",
                "created_at"        => Carbon::now(),
                "updated_at"        => Carbon::now(),
           ],
           [
                "operator" => "MyTel",
                "package_name" => "Data Pack",
                "package_code" => "3000",
                "volume" => "3000 MB",
                "price" => "3150",
                "created_at"        => Carbon::now(),
                "updated_at"        => Carbon::now(),
           ],
           [
                "operator" => "MyTel",
                "package_name" => "Data Pack",
                "package_code" => "4000",
                "volume" => "4000 MB",
                "price" => "4200",
                "created_at"        => Carbon::now(),
                "updated_at"        => Carbon::now(),
           ],
           [
                "operator" => "MyTel",
                "package_name" => "Data Pack",
                "package_code" => "5000",
                "volume" => "5000 MB",
                "price" => "5250",
                "created_at"        => Carbon::now(),
                "updated_at"        => Carbon::now(),
           ],
           [
                "operator" => "MyTel",
                "package_name" => "Data Pack",
                "package_code" => "10",
                "volume" => "10 GB",
                "price" => "10500",
                "created_at"        => Carbon::now(),
                "updated_at"        => Carbon::now(),
           ],
           [
                "operator" => "MyTel",
                "package_name" => "Data Pack",
                "package_code" => "20",
                "volume" => "20 GB",
                "price" => "21000",
                "created_at"        => Carbon::now(),
                "updated_at"        => Carbon::now(),
           ],
           [
                "operator" => "MyTel",
                "package_name" => "Data Pack",
                "package_code" => "30",
                "volume" => "30 GB",
                "price" => "31500",
                "created_at"        => Carbon::now(),
                "updated_at"        => Carbon::now(),
           ],
           [
                "operator" => "Ooredoo",
                "package_name" => "Data Pack",
                "package_code" => "817001102",
                "volume" => "1GB",
                "price" => "999",
                "created_at"        => Carbon::now(),
                "updated_at"        => Carbon::now(),
           ],
           [
                "operator" => "Ooredoo",
                "package_name" => "Data Pack",
                "package_code" => "817001103",
                "volume" => "2.5GB",
                "price" => "1999",
                "created_at"        => Carbon::now(),
                "updated_at"        => Carbon::now(),
           ],
           [
                "operator" => "Ooredoo",
                "package_name" => "Data Pack",
                "package_code" => "817001104",
                "volume" => "4GB",
                "price" => "2999",
                "created_at"        => Carbon::now(),
                "updated_at"        => Carbon::now(),
           ],
           [
                "operator" => "Ooredoo",
                "package_name" => "Data Pack",
                "package_code" => "817001105",
                "volume" => "8GB",
                "price" => "4999",
                "created_at"        => Carbon::now(),
                "updated_at"        => Carbon::now(),
           ],
           [
                "operator" => "Ooredoo",
                "package_name" => "Data Pack",
                "package_code" => "817001106",
                "volume" => "20GB",
                "price" => "9999",
                "created_at"        => Carbon::now(),
                "updated_at"        => Carbon::now(),
           ]
        ]);
    }
}