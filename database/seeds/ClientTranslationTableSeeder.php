<?php

use Database\DisableForeignKeys;
use Database\TruncateTable;
use Illuminate\Database\Seeder;
use Spatie\TranslationLoader\LanguageLine;

class ClientTranslationTableSeeder extends Seeder
{

    use DisableForeignKeys, TruncateTable;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();

        /*
         *  SMS
         */
        LanguageLine::create([
            'group' => 'client',
            'key' => 'sms.title',
            'text' => [
                'en' => 'SMS'
            ],
            'default_text'   => 'SMS'
        ]);

        LanguageLine::create([
            'group' => 'client',
            'key' => 'sms.wizard.message_details',
            'text' => [
                'en' => 'Message Details'
            ],
            'default_text'   => 'Message Details'
        ]);

        LanguageLine::create([
            'group' => 'client',
            'key' => 'sms.wizard.phone_group',
            'text' => [
                'en' => 'Phone Group'
            ],
            'default_text'   => 'Phone Group'
        ]);

        LanguageLine::create([
            'group' => 'client',
            'key' => 'sms.wizard.preview',
            'text' => [
                'en' => 'Preview'
            ],
            'default_text'   => 'Preview'
        ]);

        LanguageLine::create([
            'group' => 'client',
            'key' => 'sms.wizard.message_title',
            'text' => [
                'en' => 'Message Title'
            ],
            'default_text'   => 'Message Title'
        ]);

        LanguageLine::create([
            'group' => 'client',
            'key' => 'sms.wizard.message_body',
            'text' => [
                'en' => 'Message Body'
            ],
            'default_text'   => 'Message Body'
        ]);

        LanguageLine::create([
            'group' => 'client',
            'key' => 'sms.wizard.use_blue_planet_phone',
            'text' => [
                'en' => 'Use BluePlanet phone numbers'
            ],
            'default_text'   => 'Use BluePlanet phone numbers'
        ]);

        LanguageLine::create([
            'group' => 'client',
            'key' => 'sms.wizard.available_phone',
            'text' => [
                'en' => 'Available Phone'
            ],
            'default_text'   => 'Available Phone'
        ]);

        LanguageLine::create([
            'group' => 'client',
            'key' => 'sms.wizard.number_of_sms',
            'text' => [
                'en' => 'Numbers of Sms'
            ],
            'default_text'   => 'Numbers of Sms'
        ]);

        LanguageLine::create([
            'group' => 'client',
            'key' => 'sms.wizard.select_group',
            'text' => [
                'en' => 'Selected Groups'
            ],
            'default_text'   => 'Selected Groups'
        ]);

        LanguageLine::create([
            'group' => 'client',
            'key' => 'sms.table.message_title',
            'text' => [
                'en' => 'Message Title'
            ],
            'default_text'   => 'Message Title'
        ]);

        LanguageLine::create([
            'group' => 'client',
            'key' => 'sms.table.message_body',
            'text' => [
                'en' => 'Message Body'
            ],
            'default_text'   => 'Message Body'
        ]);

        LanguageLine::create([
            'group' => 'client',
            'key' => 'sms.table.send_by',
            'text' => [
                'en' => 'Send by'
            ],
            'default_text'   => 'Send By'
        ]);

        LanguageLine::create([
            'group' => 'client',
            'key' => 'sms.table.sms',
            'text' => [
                'en' => 'Sms'
            ],
            'default_text'   => 'Sms'
        ]);

        LanguageLine::create([
            'group' => 'client',
            'key' => 'sms.table.at',
            'text' => [
                'en' => 'At'
            ],
            'default_text'   => 'At'
        ]);

        LanguageLine::create([
            'group' => 'client',
            'key' => 'sms.table.phone_number',
            'text' => [
                'en' => 'Phone Number'
            ],
            'default_text'   => 'Phone Number'
        ]);

        LanguageLine::create([
            'group' => 'client',
            'key' => 'sms.table.operator',
            'text' => [
                'en' => 'Operator'
            ],
            'default_text'   => 'Operator'
        ]);

        LanguageLine::create([
            'group' => 'client',
            'key' => 'sms.table.status',
            'text' => [
                'en' => 'Status'
            ],
            'default_text'   => 'Status'
        ]);

        LanguageLine::create([
            'group' => 'client',
            'key' => 'sms.buy_contact_model.buy',
            'text' => [
                'en' => 'Buy'
            ],
            'default_text'   => 'Buy'
        ]);

        LanguageLine::create([
            'group' => 'client',
            'key' => 'sms.buy_contact_model.number_of_phone',
            'text' => [
                'en' => 'Numbers Of Phone'
            ],
            'default_text'   => 'Numbers Of Phone'
        ]);

        LanguageLine::create([
            'group' => 'client',
            'key' => 'sms.buy_contact_model.choose_operator',
            'text' => [
                'en' => 'Choose Operator'
            ],
            'default_text'   => 'Choose Operator'
        ]);

        LanguageLine::create([
            'group' => 'client',
            'key' => 'sms.buy_contact_model.choose_payment_methods',
            'text' => [
                'en' => 'Choose Payment Methods'
            ],
            'default_text'   => 'Choose Payment Methods'
        ]);

        LanguageLine::create([
            'group' => 'client',
            'key' => 'sms.buy_contact_model.payment_due',
            'text' => [
                'en' => 'Payment Due'
            ],
            'default_text'   => 'Payment Due'
        ]);

        LanguageLine::create([
            'group' => 'client',
            'key' => 'sms.buy_contact_model.sub_total',
            'text' => [
                'en' => 'Subtotal'
            ],
            'default_text'   => 'Subtotal'
        ]);

        LanguageLine::create([
            'group' => 'client',
            'key' => 'sms.buy_contact_model.tax',
            'text' => [
                'en' => 'Tax'
            ],
            'default_text'   => 'Tax'
        ]);

        LanguageLine::create([
            'group' => 'client',
            'key' => 'sms.buy_contact_model.total',
            'text' => [
                'en' => 'Total'
            ],
            'default_text'   => 'Total'
        ]);

        LanguageLine::create([
            'group' => 'client',
            'key' => 'sms.buy_contact_model.buy_now',
            'text' => [
                'en' => 'Buy Now'
            ],
            'default_text'   => 'Buy Now'
        ]);

        LanguageLine::create([
            'group' => 'client',
            'key' => 'sms.buy_contact_confirm_model.payment_confirmation',
            'text' => [
                'en' => 'Payment Confirmation'
            ],
            'default_text'   => 'Payment Confirmation'
        ]);

        /*
         *  Package
         */

        LanguageLine::create([
            'group' => 'client',
            'key' => 'package.title',
            'text' => [
                'en' => 'Packages'
            ],
            'default_text'   => 'Packages'
        ]);

        LanguageLine::create([
            'group' => 'client',
            'key' => 'package.sub_title',
            'text' => [
                'en' => 'Choose Package'
            ],
            'default_text'   => 'Choose Package'
        ]);

        LanguageLine::create([
            'group' => 'client',
            'key' => 'package.info',
            'text' => [
                'en' => 'Payment Information'
            ],
            'default_text'   => 'Payment Information'
        ]);

        LanguageLine::create([
            'group' => 'client',
            'key' => 'package.detail',
            'text' => [
                'en' => 'Details'
            ],
            'default_text'   => 'Details'
        ]);

        LanguageLine::create([
            'group' => 'client',
            'key' => 'package.select_sms_package',
            'text' => [
                'en' => 'Select SMS Package'
            ],
            'default_text'   => 'Select SMS Package'
        ]);

        LanguageLine::create([
            'group' => 'client',
            'key' => 'package.number_of_phone',
            'text' => [
                'en' => 'Numbers Of Phone'
            ],
            'default_text'   => 'Numbers Of Phone'
        ]);

        LanguageLine::create([
            'group' => 'client',
            'key' => 'package.choose_operator',
            'text' => [
                'en' => 'Choose Operator'
            ],
            'default_text'   => 'Choose Operator'
        ]);

        LanguageLine::create([
            'group' => 'client',
            'key' => 'package.choose_payment_methods',
            'text' => [
                'en' => 'Choose Payment Methods'
            ],
            'default_text'   => 'Choose Payment Methods'
        ]);

        LanguageLine::create([
            'group' => 'client',
            'key' => 'package.payment_due',
            'text' => [
                'en' => 'Payment Due'
            ],
            'default_text'   => 'Payment Due'
        ]);

        LanguageLine::create([
            'group' => 'client',
            'key' => 'package.sub_total',
            'text' => [
                'en' => 'Subtotal'
            ],
            'default_text'   => 'Subtotal'
        ]);

        LanguageLine::create([
            'group' => 'client',
            'key' => 'package.tax',
            'text' => [
                'en' => 'Tax'
            ],
            'default_text'   => 'Tax'
        ]);

        LanguageLine::create([
            'group' => 'client',
            'key' => 'package.total',
            'text' => [
                'en' => 'Total'
            ],
            'default_text'   => 'Total'
        ]);

        LanguageLine::create([
            'group' => 'client',
            'key' => 'package.qty',
            'text' => [
                'en' => 'Qty'
            ],
            'default_text'   => 'Qty'
        ]);

        LanguageLine::create([
            'group' => 'client',
            'key' => 'package.buttons.buy_now',
            'text' => [
                'en' => 'Buy Now'
            ],
            'default_text'   => 'Buy Now'
        ]);

        /*
         *  Phone
         */

        LanguageLine::create([
            'group' => 'client',
            'key' => 'phone.title',
            'text' => [
                'en' => 'MyDatabase'
            ],
            'default_text'   => 'MyDatabase'
        ]);

        LanguageLine::create([
            'group' => 'client',
            'key' => 'phone.sub_title',
            'text' => [
                'en' => 'Phone Number Group List'
            ],
            'default_text'   => 'Phone Number Group List'
        ]);

        LanguageLine::create([
            'group' => 'client',
            'key' => 'phone.management',
            'text' => [
                'en' => 'Phone Number Group Management'
            ],
            'default_text'   => 'Phone Number Group Management'
        ]);

        LanguageLine::create([
            'group' => 'client',
            'key' => 'phone.list',
            'text' => [
                'en' => 'Phone Number List'
            ],
            'default_text'   => 'Phone Number List'
        ]);

        LanguageLine::create([
            'group' => 'client',
            'key' => 'phone.buttons.sample_example',
            'text' => [
                'en' => 'Sample Excel'
            ],
            'default_text'   => 'Sample Excel'
        ]);

        LanguageLine::create([
            'group' => 'client',
            'key' => 'phone.buttons.import_excel',
            'text' => [
                'en' => 'Import Excel'
            ],
            'default_text'   => 'Import Excel'
        ]);

        LanguageLine::create([
            'group' => 'client',
            'key' => 'phone.buttons.create_phone_group',
            'text' => [
                'en' => 'Create Phone Group'
            ],
            'default_text'   => 'Create Phone Group'
        ]);

        LanguageLine::create([
            'group' => 'client',
            'key' => 'phone.buttons.add_phone_number',
            'text' => [
                'en' => 'Add Phone Number'
            ],
            'default_text'   => 'Add Phone Number'
        ]);

        LanguageLine::create([
            'group' => 'client',
            'key' => 'phone.table.group',
            'text' => [
                'en' => 'Group'
            ],
            'default_text'   => 'Group'
        ]);

        LanguageLine::create([
            'group' => 'client',
            'key' => 'phone.table.class',
            'text' => [
                'en' => 'Class'
            ],
            'default_text'   => 'Class'
        ]);

        LanguageLine::create([
            'group' => 'client',
            'key' => 'phone.table.number_of_phone',
            'text' => [
                'en' => 'Numbers Of Phone'
            ],
            'default_text'   => 'Numbers Of Phone'
        ]);

        LanguageLine::create([
            'group' => 'client',
            'key' => 'phone.table.phone_number',
            'text' => [
                'en' => 'Phone Number'
            ],
            'default_text'   => 'Phone Number'
        ]);

        LanguageLine::create([
            'group' => 'client',
            'key' => 'phone.table.operator',
            'text' => [
                'en' => 'Operator'
            ],
            'default_text'   => 'Operator'
        ]);

        LanguageLine::create([
            'group' => 'client',
            'key' => 'phone.model.add_phone_number',
            'text' => [
                'en' => 'Add Phone Number'
            ],
            'default_text'   => 'Add Phone Number'
        ]);

        LanguageLine::create([
            'group' => 'client',
            'key' => 'phone.model.phone_number',
            'text' => [
                'en' => 'Phone Number'
            ],
            'default_text'   => 'Phone Number'
        ]);

        LanguageLine::create([
            'group' => 'client',
            'key' => 'phone.model.choose_operator',
            'text' => [
                'en' => 'Choose Operator'
            ],
            'default_text'   => 'Choose Operator'
        ]);

        LanguageLine::create([
            'group' => 'client',
            'key' => 'phone.model.choose_gender',
            'text' => [
                'en' => 'Choose Gender'
            ],
            'default_text'   => 'Choose Gender'
        ]);

        LanguageLine::create([
            'group' => 'client',
            'key' => 'phone.model.create_phone_group',
            'text' => [
                'en' => 'Create Phone Group'
            ],
            'default_text'   => 'Create Phone Group'
        ]);

        LanguageLine::create([
            'group' => 'client',
            'key' => 'phone.model.group_name',
            'text' => [
                'en' => 'Group Name'
            ],
            'default_text'   => 'Group Name'
        ]);

        LanguageLine::create([
            'group' => 'client',
            'key' => 'phone.model.import_phone_number',
            'text' => [
                'en' => 'Import Phone Number'
            ],
            'default_text'   => 'Import Phone Number'
        ]);

        LanguageLine::create([
            'group' => 'client',
            'key' => 'phone.model.choose_phone_group',
            'text' => [
                'en' => 'Choose Phone Group'
            ],
            'default_text'   => 'Choose Phone Group'
        ]);

        LanguageLine::create([
            'group' => 'client',
            'key' => 'phone.model.sample_excel',
            'text' => [
                'en' => 'Sample Excel'
            ],
            'default_text'   => 'Sample Excel'
        ]);

        LanguageLine::create([
            'group' => 'client',
            'key' => 'phone.model.update_phone_group',
            'text' => [
                'en' => 'Update Phone Group'
            ],
            'default_text'   => 'Update Phone Group'
        ]);

        $this->enableForeignKeys();
    }
}
