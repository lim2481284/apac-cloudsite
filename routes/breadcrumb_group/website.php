<?php 


    # Home
    Breadcrumbs::for('ecommerce.home', function ($trail) {
        $trail->push(translate('home','Home'), route('static'));
    });


    # Home > TAC
    Breadcrumbs::for('ecommerce.tac', function ($trail) {
        $trail->parent('ecommerce.home');
        $trail->push(translate('tac','Terms and Conditions'), route('static','tac'));
    });


    # Home > Privacy
    Breadcrumbs::for('ecommerce.privacy', function ($trail) {
        $trail->parent('ecommerce.home');
        $trail->push(translate('privacy','Privacy Policy'), route('static','privacy'));
    });


    # Home > Return 
    Breadcrumbs::for('ecommerce.return', function ($trail) {
        $trail->parent('ecommerce.home');
        $trail->push(translate('return','Delivery and Return Policy'), route('static','return'));
    });


    # Home > FAQ
    Breadcrumbs::for('ecommerce.faq', function ($trail) {
        $trail->parent('ecommerce.home');
        $trail->push(translate('faq','FAQ'), route('faq.index'));
    });


    # Home > FAQ > [Search Query]
    Breadcrumbs::for('ecommerce.faq.search', function ($trail, $breadcrum) {
        $trail->parent('ecommerce.faq');
        $trail->push($breadcrum, route('faq.search', $breadcrum??''));
    });


    # Home > Shop
    Breadcrumbs::for('ecommerce.shop', function ($trail) {
        $trail->parent('ecommerce.home');
        $trail->push(translate('store','Store'), route('static','store'));
    });

    # Home > Shop > [Product]
    Breadcrumbs::for('ecommerce.product', function ($trail, $product) {
        $trail->parent('ecommerce.shop');
        $trail->push($product, route('product.index', $product));
    });


    # Home > Profile
    Breadcrumbs::for('ecommerce.profile', function ($trail) {
        $trail->parent('ecommerce.home');
        $trail->push(translate('profile','Profile'), route('profile.index'));
    });


    # Home > Profile > Order History
    Breadcrumbs::for('ecommerce.order.history', function ($trail) {
        $trail->parent('ecommerce.profile');
        $trail->push(translate('order_history','Order History'), route('profile.order.history'));
    });


    # Home > Profile > Promo Code
    Breadcrumbs::for('ecommerce.promocode', function ($trail) {
        $trail->parent('ecommerce.profile');
        $trail->push(translate('promocode','Promo Code'), route('profile.promocode'));
    });

    # Home > Profile > Order History > Check order
    Breadcrumbs::for('ecommerce.order.check', function ($trail, $code) {
        $trail->parent('ecommerce.order.history');
        $trail->push(translate('check_order','Check Order'), route('profile.order.check',$code));
    });

    # Home > Profile > Order History > Shipping tracking
    Breadcrumbs::for('ecommerce.order.tracking', function ($trail, $code) {
        $trail->parent('ecommerce.order.history');
        $trail->push(translate('shipping_tracking','Shipping Tracking'), route('profile.order.shipping.tracking.code',$code));
    });
