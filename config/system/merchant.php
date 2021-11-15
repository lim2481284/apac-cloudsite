<?php 

return [

    'onboarding' => [
        'security' =>  [
            'key' => 'scr',
            'link' => '/account#fa',
            'icon' => '/img/icon/onboarding_security.png'
        ],
        'general' => [
            'key' => 'gnl',
            'link' => '/system/general',
            'icon' => '/img/icon/onboarding_general.png'
        ],
        'store_builder' => [
            'key' => 'cstw',
            'link' => '/system/cms',
            'icon' => '/img/icon/onboarding_cms.png'
        ],
        'product' => [
            'key' => 'prd',
            'link' => '/product',
            'icon' => '/img/icon/onboarding_product.png'
        ],
        'shipping' => [
            'key' => 'shp',
            'link' => '/system/shipping',
            'icon' => '/img/icon/onboarding_shipping.png'
        ],
        'promotion' => [
            'key' => 'pmt',
            'link' => '/promotion',
            'icon' => '/img/icon/onboarding_promotion.png'
        ],
        'announcement' => [
            'key' => 'anc',
            'link' => '/system/announcement',
            'icon' => '/img/icon/onboarding_announcement.png'
        ],
        'faq' => [
            'key' => 'faq',
            'link' => '/system/faq',
            'icon' => '/img/icon/onboarding_faq.png'
        ],
        'staff' => [
            'key' => 'stf',
            'link' => '/system/staff',
            'icon' => '/img/icon/onboarding_staff.png'
        ],
    ],


    'status' => [
        'active'        =>  1,
        'inactive'      =>  2,      // expired
        'deactivated'   =>  3,
        'deleted'       =>  4,      // Permanent deleted
    ],

    'meta' => [
        'language'      => 'lang',
        'currency'      => 'crc',
        'product_limit' => 'pl',
        'storage_size'  => 'ss',
        'startup_question' => 'sq',
        'industry'      => 'idt',
        'sender_postcode'      => 'spc',
        'sender_state'      => 'stt',
        'sender_name'      => 'sn',
        'sender_contact'      => 'sct',
        'sender_address'      => 'sadd',
        'sender_city'      => 'scty',
        'bank_account'      => 'bacc',
        'bank_owner'      => 'bow',
        'bank_name'      => 'bnm',
        'onboarding' => 'obd',
        'domain_update_time' => 'dut',
        'industry_update_time' => 'iut',
        'telegram_id' => 'tlgi',
        'telegram_status' => 'tlgs',
    ],


    'industry' => [
        1 => 'Mobile Phone Gadgets',
        2 => 'Phone Accessories',
        3 => 'Computer Accessories',
        4 => 'Cameras & Photography',
        5 => 'Game Consoles',
        6 => "Women Collection",
        7 => "Men Collection",
        8 => 'Fashion Accessories',
        9 => 'Bed & Bath',
        10 => 'Home & Kitchen Appliances ',
        11 => 'Furniture & Decoration',
        12 => 'Garden Items',
        13 => 'Sports & Outdoor',
        14 => 'Hobby & Collectibles',
        15 => 'Baby & Toys',
        16 => "Groceries",
        17 => "Health Care & Beauty",
        18 => "Car Accessories",
        19 => "Industrial Appliances",
        20 => "Tickets & Vouchers",
        21 => "Pets",
        22 => "Food & Beverage",
    ],


    

];