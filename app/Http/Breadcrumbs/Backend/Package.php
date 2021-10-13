<?php
/**
 * Created by PhpStorm.
 * User: nyinyilwin
 * Date: 5/8/17
 * Time: 3:23 PM
 */

Breadcrumbs::register('admin.package.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.home');
    $breadcrumbs->push(trans('package.management'), route('admin.package.index'));
});

Breadcrumbs::register('admin.package.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.package.index');
    $breadcrumbs->push(trans('package.create'), route('admin.package.create'));
});

Breadcrumbs::register('admin.package.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.package.index');
    $breadcrumbs->push(trans('package.edit'), route('admin.package.edit', $id));
});

Breadcrumbs::register('admin.package.show', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.package.index');
    $breadcrumbs->push(trans('package.view'), route('admin.package.show', $id));
});