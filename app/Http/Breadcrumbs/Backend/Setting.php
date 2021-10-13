<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 3/17/2017
 * Time: 10:10 AM
 */

Breadcrumbs::register('admin.setting.config.general', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.home');
    $breadcrumbs->push(trans('settings.configuration.general.title'), route('admin.setting.config.general'));
});

Breadcrumbs::register('admin.setting.config.company', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.home');
    $breadcrumbs->push(trans('settings.configuration.company.title'), route('admin.setting.config.company'));
});

Breadcrumbs::register('admin.setting.config.payment', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.home');
    $breadcrumbs->push(trans('settings.configuration.payment.title'), route('admin.setting.config.payment'));
});

Breadcrumbs::register('admin.setting.config.currency', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.home');
    $breadcrumbs->push(trans('settings.currency.title'), route('admin.setting.config.currency'));
});

Breadcrumbs::register('admin.setting.config.mail', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.home');
    $breadcrumbs->push(trans('settings.configuration.mail.title'), route('admin.setting.config.mail'));
});

Breadcrumbs::register('admin.setting.language.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.home');
    $breadcrumbs->push(trans('settings.translation.title'), route('admin.setting.language.index'));
});

Breadcrumbs::register('admin.setting.translation.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.setting.language.index');
    $breadcrumbs->push(trans('settings.translation.group'), route('admin.setting.translation.index'));
});