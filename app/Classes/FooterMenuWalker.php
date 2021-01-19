<?php declare(strict_types=1);

namespace App\Classes;

class FooterMenuWalker extends MosWalker {

    protected $class_names = [
        'menu_item' => 'ft-Menu_Item',
        'menu_item_link' => 'ft-Menu_Item_Link',
        'submenu' => 'ft-Submenu',
        'submenu_item' => 'ft-Submenu_Item',
        'submenu_item_link' => 'ft-Submenu_Item_Link',
    ];

}
