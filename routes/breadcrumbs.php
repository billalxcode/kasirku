<?php
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('dashboard'));
});

Breadcrumbs::for('category', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Category', route('category.home'));
});

Breadcrumbs::for('product', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Product', route('product.home'));
});

Breadcrumbs::for('product.create', function (BreadcrumbTrail $trail) {
    $trail->parent('product');
    $trail->push('Create', route('product.create'));
});

Breadcrumbs::for('user', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('User', route('user.home'));
});

Breadcrumbs::for('user.create', function (BreadcrumbTrail $trail) {
    $trail->parent('user');
    $trail->push('Create', route('user.create'));
});

Breadcrumbs::for('user.role', function (BreadcrumbTrail $trail) {
    $trail->parent('user');
    $trail->push('Role', route('user.role.home'));
});

Breadcrumbs::for('customer', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Customer', route('customer.home'));
});

Breadcrumbs::for('customer.create', function (BreadcrumbTrail $trail) {
    $trail->parent('customer');
    $trail->push('Create', route('customer.create'));
});

Breadcrumbs::for('supplier', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Supplier', route('supplier.home'));
});

Breadcrumbs::for('supplier.create', function (BreadcrumbTrail $trail) {
    $trail->parent('supplier');
    $trail->push('Create', route('supplier.create'));
});

Breadcrumbs::for('voucher', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Voucher', route('voucher.home'));
});

Breadcrumbs::for('voucher.create', function (BreadcrumbTrail $trail) {
    $trail->parent('voucher');
    $trail->push('Create', route('voucher.create'));
});