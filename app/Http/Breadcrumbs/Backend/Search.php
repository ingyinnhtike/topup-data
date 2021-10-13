<?php

Breadcrumbs::register('admin.search.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.home');
    $breadcrumbs->push(trans('strings.backend.search.title'), route('admin.search.index'));
});
