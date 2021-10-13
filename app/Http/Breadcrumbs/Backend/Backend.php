<?php

Breadcrumbs::register('admin.home', function ($breadcrumbs) {
    $breadcrumbs->push('Dashboard', route('admin.home'));
});

Breadcrumbs::register('admin.orders.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.home');
    $breadcrumbs->push(__('Orders'), route('admin.orders.index'));
});

Breadcrumbs::register('admin.order.transfer', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.orders.index');
    $breadcrumbs->push('Transfer', route('admin.order.transfer'));
});

Breadcrumbs::register('admin.merchants.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.home');
    $breadcrumbs->push('Merchants', route('admin.merchants.index'));
});

Breadcrumbs::register('admin.merchants.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.merchants.index');
    $breadcrumbs->push('Add', route('admin.merchants.create'));
});

Breadcrumbs::register('admin.merchants.show', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.merchants.index');
    $breadcrumbs->push('Detail', route('admin.merchants.show', $id));
});

Breadcrumbs::register('admin.merchants.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.merchants.index');
    $breadcrumbs->push('Edit', route('admin.merchants.edit', $id));
});

Breadcrumbs::register('admin.services.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.home');
    $breadcrumbs->push('Services', route('admin.services.index'));
});

Breadcrumbs::register('admin.services.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.services.index');
    $breadcrumbs->push('Add', route('admin.services.create'));
});

Breadcrumbs::register('admin.services.show', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.services.index');
    $breadcrumbs->push('Detail', route('admin.services.show', $id));
});

Breadcrumbs::register('admin.services.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.services.index');
    $breadcrumbs->push('Edit', route('admin.services.edit', $id));
});

require __DIR__.'/Search.php';
require __DIR__.'/Access.php';
require __DIR__.'/LogViewer.php';
require __DIR__.'/Package.php';
require __DIR__.'/Setting.php';
require __DIR__.'/Menu.php';
