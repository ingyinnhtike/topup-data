<?php

use Database\DisableForeignKeys;
use Database\TruncateTable;
use Illuminate\Database\Seeder;
use Spatie\TranslationLoader\LanguageLine;

class TranslationTableSeeder extends Seeder
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
        $this->truncate('language_lines');

        /**
         *  Alerts Language Line
         **/
        LanguageLine::create([
            'group' => 'alerts',
            'key' => 'backend.roles.created',
            'text' => [
                'en' => 'The role was successfully created.'
            ],
            'default_text'   => 'The role was successfully created.'
        ]);

        LanguageLine::create([
            'group' => 'alerts',
            'key' => 'backend.roles.deleted',
            'text' => [
                'en' => 'The role was successfully deleted.'
            ],
            'default_text'   => 'The role was successfully deleted.'
        ]);

        LanguageLine::create([
            'group' => 'alerts',
            'key' => 'backend.roles.updated',
            'text' => [
                'en' => 'The role was successfully updated.'
            ],
            'default_text'   => 'The role was successfully updated.'
        ]);

        LanguageLine::create([
            'group' => 'alerts',
            'key' => 'backend.users.created',
            'text' => [
                'en' => 'The user was successfully created.'
            ],
            'default_text'   => 'The user was successfully created.'
        ]);

        LanguageLine::create([
            'group' => 'alerts',
            'key' => 'backend.users.deleted',
            'text' => [
                'en' => 'The user was successfully deleted.'
            ],
            'default_text'   => 'The user was successfully deleted.'
        ]);

        LanguageLine::create([
            'group' => 'alerts',
            'key' => 'backend.users.updated',
            'text' => [
                'en' => 'The user was successfully updated.'
            ],
            'default_text'   => 'The user was successfully updated.'
        ]);

        LanguageLine::create([
            'group' => 'alerts',
            'key' => 'backend.users.restored',
            'text' => [
                'en' => 'The user was successfully restored.'
            ],
            'default_text'   => 'The user was successfully restored.'
        ]);

        LanguageLine::create([
            'group' => 'alerts',
            'key' => 'backend.users.confirmation_email',
            'text' => [
                'en' => 'A new confirmation e-mail has been sent to the address on file.'
            ],
            'default_text'   => 'A new confirmation e-mail has been sent to the address on file.'
        ]);

        LanguageLine::create([
            'group' => 'alerts',
            'key' => 'backend.users.deleted_permanently',
            'text' => [
                'en' => 'The user was deleted permanently.'
            ],
            'default_text'   => 'The user was deleted permanently.'
        ]);

        LanguageLine::create([
            'group' => 'alerts',
            'key' => 'backend.users.updated_password',
            'text' => [
                'en' => 'The user\'s password was successfully updated.'
            ],
            'default_text'   => 'The user\'s password was successfully updated.'
        ]);

        /**
         *  Auth Language Lines
         **/

        LanguageLine::create([
            'group' => 'auth',
            'key' => 'failed',
            'text' => [
                'en' => 'These credentials do not match our records.'
            ],
            'default_text'   => 'These credentials do not match our records.'
        ]);

        LanguageLine::create([
            'group' => 'auth',
            'key' => 'general_error',
            'text' => [
                'en' => 'You do not have access to do that.'
            ],
            'default_text'   => 'You do not have access to do that.'
        ]);

        LanguageLine::create([
            'group' => 'auth',
            'key' => 'socialite.unacceptable',
            'text' => [
                'en' => ':provider is not an acceptable login type.'
            ],
            'default_text'   => ':provider is not an acceptable login type.'
        ]);

        LanguageLine::create([
            'group' => 'auth',
            'key' => 'throttle',
            'text' => [
                'en' => 'Too many login attempts. Please try again in :seconds seconds.'
            ],
            'default_text'   => 'Too many login attempts. Please try again in :seconds seconds.'
        ]);

        LanguageLine::create([
            'group' => 'auth',
            'key' => 'unknown',
            'text' => [
                'en' => 'An unknown error occurred'
            ],
            'default_text'   => 'An unknown error occurred'
        ]);

        /**
         *  Button Language Lines
         **/


        LanguageLine::create([
            'group' => 'buttons',
            'key' => 'backend.access.users.activate',
            'text' => [
                'en' => 'Activate'
            ],
            'default_text'   => 'Activate'
        ]);

        LanguageLine::create([
            'group' => 'buttons',
            'key' => 'backend.access.users.change_password',
            'text' => [
                'en' => 'Change Password'
            ],
            'default_text'   => 'Change Password'
        ]);

        LanguageLine::create([
            'group' => 'buttons',
            'key' => 'backend.access.users.deactivate',
            'text' => [
                'en' => 'Deactivate'
            ],
            'default_text'   => 'Deactivate'
        ]);

        LanguageLine::create([
            'group' => 'buttons',
            'key' => 'backend.access.users.delete_permanently',
            'text' => [
                'en' => 'Delete Permanently'
            ],
            'default_text'   => 'Delete Permanently'
        ]);

        LanguageLine::create([
            'group' => 'buttons',
            'key' => 'backend.access.users.login_as',
            'text' => [
                'en' => 'Login As :user'
            ],
            'default_text'   => 'Login As :user'
        ]);

        LanguageLine::create([
            'group' => 'buttons',
            'key' => 'backend.access.users.resend_email',
            'text' => [
                'en' => 'Resend Confirmation E-mail'
            ],
            'default_text'   => 'Resend Confirmation E-mail'
        ]);

        LanguageLine::create([
            'group' => 'buttons',
            'key' => 'backend.access.users.restore_user',
            'text' => [
                'en' => 'Restore User'
            ],
            'default_text'   => 'Restore User'
        ]);

        LanguageLine::create([
            'group' => 'buttons',
            'key' => 'emails.auth.confirm_account',
            'text' => [
                'en' => 'Confirm Account'
            ],
            'default_text'   => 'Confirm Account'
        ]);

        LanguageLine::create([
            'group' => 'buttons',
            'key' => 'emails.auth.reset_password',
            'text' => [
                'en' => 'Reset Password'
            ],
            'default_text'   => 'Reset Password'
        ]);

        LanguageLine::create([
            'group' => 'buttons',
            'key' => 'general.cancel',
            'text' => [
                'en' => 'Cancel'
            ],
            'default_text'   => 'Cancel'
        ]);

        LanguageLine::create([
            'group' => 'buttons',
            'key' => 'general.save',
            'text' => [
                'en' => 'Save'
            ],
            'default_text'   => 'Save'
        ]);

        LanguageLine::create([
            'group' => 'buttons',
            'key' => 'general.view',
            'text' => [
                'en' => 'View'
            ],
            'default_text'   => 'View'
        ]);

        LanguageLine::create([
            'group' => 'buttons',
            'key' => 'general.crud.create',
            'text' => [
                'en' => 'Create'
            ],
            'default_text'   => 'Create'
        ]);

        LanguageLine::create([
            'group' => 'buttons',
            'key' => 'general.crud.delete',
            'text' => [
                'en' => 'Delete'
            ],
            'default_text'   => 'Delete'
        ]);

        LanguageLine::create([
            'group' => 'buttons',
            'key' => 'general.crud.edit',
            'text' => [
                'en' => 'Edit'
            ],
            'default_text'   => 'Edit'
        ]);


        LanguageLine::create([
            'group' => 'buttons',
            'key' => 'general.crud.update',
            'text' => [
                'en' => 'Update'
            ],
            'default_text'   => 'Update'
        ]);

        LanguageLine::create([
            'group' => 'buttons',
            'key' => 'general.crud.view',
            'text' => [
                'en' => 'View'
            ],
            'default_text'   => 'View'
        ]);

        LanguageLine::create([
            'group' => 'buttons',
            'key' => 'general.crud.enable',
            'text' => [
                'en' => 'Enable'
            ],
            'default_text'   => 'Enable'
        ]);

        LanguageLine::create([
            'group' => 'buttons',
            'key' => 'general.crud.disable',
            'text' => [
                'en' => 'Disable'
            ],
            'default_text'   => 'Disable'
        ]);

        /*
         *  Exceptions Language Lines
         */

        LanguageLine::create([
            'group' => 'exceptions',
            'key' => 'backend.access.roles.already_exists',
            'text' => [
                'en' => 'That role already exists. Please choose a different name.'
            ],
            'default_text'   => 'That role already exists. Please choose a different name.'
        ]);

        LanguageLine::create([
            'group' => 'exceptions',
            'key' => 'backend.access.roles.cant_delete_admin',
            'text' => [
                'en' => 'You can not delete the Administrator role.'
            ],
            'default_text'   => 'You can not delete the Administrator role.'
        ]);

        LanguageLine::create([
            'group' => 'exceptions',
            'key' => 'backend.access.roles.create_error',
            'text' => [
                'en' => 'There was a problem creating this role. Please try again.'
            ],
            'default_text'   => 'There was a problem creating this role. Please try again.'
        ]);

        LanguageLine::create([
            'group' => 'exceptions',
            'key' => 'backend.access.roles.delete_error',
            'text' => [
                'en' => 'There was a problem deleting this role. Please try again.'
            ],
            'default_text'   => 'There was a problem deleting this role. Please try again.'
        ]);

        LanguageLine::create([
            'group' => 'exceptions',
            'key' => 'backend.access.roles.has_users',
            'text' => [
                'en' => 'You can not delete a role with associated users.'
            ],
            'default_text'   => 'You can not delete a role with associated users.'
        ]);

        LanguageLine::create([
            'group' => 'exceptions',
            'key' => 'backend.access.roles.needs_permission',
            'text' => [
                'en' => 'You must select at least one permission for this role.'
            ],
            'default_text'   => 'You must select at least one permission for this role.'
        ]);

        LanguageLine::create([
            'group' => 'exceptions',
            'key' => 'backend.access.roles.not_found',
            'text' => [
                'en' => 'That role does not exist.'
            ],
            'default_text'   => 'That role does not exist.'
        ]);

        LanguageLine::create([
            'group' => 'exceptions',
            'key' => 'backend.access.roles.update_error',
            'text' => [
                'en' => 'There was a problem updating this role. Please try again.'
            ],
            'default_text'   => 'There was a problem updating this role. Please try again.'
        ]);

        LanguageLine::create([
            'group' => 'exceptions',
            'key' => 'backend.access.users.cant_deactivate_self',
            'text' => [
                'en' => 'You can not do that to yourself.'
            ],
            'default_text'   => 'You can not do that to yourself.'
        ]);

        LanguageLine::create([
            'group' => 'exceptions',
            'key' => 'backend.access.users.cant_delete_self',
            'text' => [
                'en' => 'You can not delete yourself.'
            ],
            'default_text'   => 'You can not delete yourself.'
        ]);

        LanguageLine::create([
            'group' => 'exceptions',
            'key' => 'backend.access.users.cant_restore',
            'text' => [
                'en' => 'This user is not deleted so it can not be restored.'
            ],
            'default_text'   => 'This user is not deleted so it can not be restored.'
        ]);

        LanguageLine::create([
            'group' => 'exceptions',
            'key' => 'backend.access.users.create_error',
            'text' => [
                'en' => 'There was a problem creating this user. Please try again.'
            ],
            'default_text'   => 'There was a problem creating this user. Please try again.'
        ]);

        LanguageLine::create([
            'group' => 'exceptions',
            'key' => 'backend.access.users.delete_error',
            'text' => [
                'en' => 'There was a problem deleting this user. Please try again.'
            ],
            'default_text'   => 'There was a problem deleting this user. Please try again.'
        ]);

        LanguageLine::create([
            'group' => 'exceptions',
            'key' => 'backend.access.users.delete_first',
            'text' => [
                'en' => 'This user must be deleted first before it can be destroyed permanently.'
            ],
            'default_text'   => 'This user must be deleted first before it can be destroyed permanently.'
        ]);

        LanguageLine::create([
            'group' => 'exceptions',
            'key' => 'backend.access.users.email_error',
            'text' => [
                'en' => 'That email address belongs to a different user.'
            ],
            'default_text'   => 'That email address belongs to a different user.'
        ]);

        LanguageLine::create([
            'group' => 'exceptions',
            'key' => 'backend.access.users.mark_error',
            'text' => [
                'en' => 'There was a problem updating this user. Please try again.'
            ],
            'default_text'   => 'There was a problem updating this user. Please try again.'
        ]);

        LanguageLine::create([
            'group' => 'exceptions',
            'key' => 'backend.access.users.not_found',
            'text' => [
                'en' => 'That user does not exist.'
            ],
            'default_text'   => 'That user does not exist.'
        ]);

        LanguageLine::create([
            'group' => 'exceptions',
            'key' => 'backend.access.users.restore_error',
            'text' => [
                'en' => 'There was a problem restoring this user. Please try again.'
            ],
            'default_text'   => 'There was a problem restoring this user. Please try again.'
        ]);

        LanguageLine::create([
            'group' => 'exceptions',
            'key' => 'backend.access.users.role_needed_create',
            'text' => [
                'en' => 'You must choose at lease one role.'
            ],
            'default_text'   => 'You must choose at lease one role.'
        ]);

        LanguageLine::create([
            'group' => 'exceptions',
            'key' => 'backend.access.users.role_needed',
            'text' => [
                'en' => 'You must choose at least one role.'
            ],
            'default_text'   => 'You must choose at least one role.'
        ]);

        LanguageLine::create([
            'group' => 'exceptions',
            'key' => 'backend.access.users.update_error',
            'text' => [
                'en' => 'There was a problem updating this user. Please try again.'
            ],
            'default_text'   => 'There was a problem updating this user. Please try again.'
        ]);

        LanguageLine::create([
            'group' => 'exceptions',
            'key' => 'backend.access.users.update_password_error',
            'text' => [
                'en' => 'There was a problem changing this users password. Please try again.'
            ],
            'default_text'   => 'There was a problem changing this users password. Please try again.'
        ]);

        /*
        *  History Language Lines
        */

        LanguageLine::create([
            'group' => 'history',
            'key' => 'backend.none',
            'text' => [
                'en' => 'There is no recent history.'
            ],
            'default_text'   => 'There is no recent history.'
        ]);

        LanguageLine::create([
            'group' => 'history',
            'key' => 'backend.none_for_type',
            'text' => [
                'en' => 'There is no history for this type.'
            ],
            'default_text'   => 'There is no history for this type.'
        ]);

        LanguageLine::create([
            'group' => 'history',
            'key' => 'backend.none_for_entity',
            'text' => [
                'en' => 'There is no history for this :entity.'
            ],
            'default_text'   => 'There is no history for this :entity.'
        ]);

        LanguageLine::create([
            'group' => 'history',
            'key' => 'backend.recent_history',
            'text' => [
                'en' => 'Recent History'
            ],
            'default_text'   => 'Recent History'
        ]);

        LanguageLine::create([
            'group' => 'history',
            'key' => 'backend.roles.created',
            'text' => [
                'en' => 'created role'
            ],
            'default_text'   => 'created role'
        ]);

        LanguageLine::create([
            'group' => 'history',
            'key' => 'backend.roles.deleted',
            'text' => [
                'en' => 'deleted role'
            ],
            'default_text'   => 'deleted role'
        ]);

        LanguageLine::create([
            'group' => 'history',
            'key' => 'backend.roles.updated',
            'text' => [
                'en' => 'updated role'
            ],
            'default_text'   => 'updated role'
        ]);

        LanguageLine::create([
            'group' => 'history',
            'key' => 'backend.users.created',
            'text' => [
                'en' => 'created role'
            ],
            'default_text'   => 'created role'
        ]);

        LanguageLine::create([
            'group' => 'history',
            'key' => 'backend.users.deleted',
            'text' => [
                'en' => 'deleted role'
            ],
            'default_text'   => 'deleted role'
        ]);

        LanguageLine::create([
            'group' => 'history',
            'key' => 'backend.users.updated',
            'text' => [
                'en' => 'updated role'
            ],
            'default_text'   => 'updated role'
        ]);

        LanguageLine::create([
            'group' => 'history',
            'key' => 'backend.users.restored',
            'text' => [
                'en' => 'restored role'
            ],
            'default_text'   => 'restored role'
        ]);

        LanguageLine::create([
            'group' => 'history',
            'key' => 'backend.users.deactivated',
            'text' => [
                'en' => 'deactivated role'
            ],
            'default_text'   => 'deactivated role'
        ]);

        LanguageLine::create([
            'group' => 'history',
            'key' => 'backend.users.reactivated',
            'text' => [
                'en' => 'reactivated role'
            ],
            'default_text'   => 'reactivated role'
        ]);

        LanguageLine::create([
            'group' => 'history',
            'key' => 'backend.users.permanently_deleted',
            'text' => [
                'en' => 'permanently deleted role'
            ],
            'default_text'   => 'permanently deleted role'
        ]);

        LanguageLine::create([
            'group' => 'history',
            'key' => 'backend.users.changed_password',
            'text' => [
                'en' => 'changed password deleted role'
            ],
            'default_text'   => 'changed password deleted role'
        ]);

        /*
         * Http Language Line
         */

        LanguageLine::create([
            'group' => 'http',
            'key' => '404.title',
            'text' => [
                'en' => 'Page Not Found'
            ],
            'default_text'   => 'Page Not Found'
        ]);

        LanguageLine::create([
            'group' => 'http',
            'key' => '404.description',
            'text' => [
                'en' => 'Sorry, but the page you were trying to view does not exist.'
            ],
            'default_text'   => 'Sorry, but the page you were trying to view does not exist.'
        ]);

        LanguageLine::create([
            'group' => 'http',
            'key' => '503.title',
            'text' => [
                'en' => 'Be right back.'
            ],
            'default_text'   => 'Be right back.'
        ]);

        LanguageLine::create([
            'group' => 'http',
            'key' => '503.description',
            'text' => [
                'en' => 'Be right back.'
            ],
            'default_text'   => 'Be right back.'
        ]);

        /*
         *  Navs Language Line
         */

        LanguageLine::create([
            'group' => 'navs',
            'key' => 'general.home',
            'text' => [
                'en' => 'Home'
            ],
            'default_text'   => 'Home'
        ]);

        LanguageLine::create([
            'group' => 'navs',
            'key' => 'general.logout',
            'text' => [
                'en' => 'Logout'
            ],
            'default_text'   => 'Logout'
        ]);

        $this->enableForeignKeys();
    }
}
