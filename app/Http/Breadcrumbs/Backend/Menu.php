<?php
/**
 * Created by PhpStorm.
 * User: nyinyilwin
 * Date: 5/15/17
 * Time: 11:03 AM
 */


Breadcrumbs::register('admin.menu.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.home');
    $breadcrumbs->push(trans('menu.management'), route('admin.menu.index'));
});

Breadcrumbs::register('admin.menu.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.menu.index');
    $breadcrumbs->push(trans('menu.edit'), route('admin.menu.edit', $id));
});

Breadcrumbs::register('admin.menu.show', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.menu.index');
    $breadcrumbs->push(trans('menu.view'), route('admin.menu.show', $id));
});