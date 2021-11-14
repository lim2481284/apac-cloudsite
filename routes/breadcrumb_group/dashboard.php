<?php 



    # Dashboard
    Breadcrumbs::for('merchant.dashboard', function ($trail) {
        $trail->push(translate('dashboard','Dashboard'), route('dashboard'));
    });


    # Dashboard > Help
    Breadcrumbs::for('merchant.help', function ($trail) {
        $trail->parent('merchant.dashboard');
        $trail->push(translate('help','Help'), route('system.help.index'));
    });


    # Dashboard > Help > [Category]
    Breadcrumbs::for('merchant.help.category', function ($trail, $category) {
        $trail->parent('merchant.help');
        $trail->push($category->title, route('system.help.category', $category->id));
    });


    # Dashboard > Help > [Search Query]
    Breadcrumbs::for('merchant.help.search', function ($trail, $query) {
        $trail->parent('merchant.help');
        $trail->push($query??'', route('system.help.search', $query??''));
    });
