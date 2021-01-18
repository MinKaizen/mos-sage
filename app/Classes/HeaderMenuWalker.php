<?php declare(strict_types=1);

namespace App\Classes;

class HeaderMenuWalker extends MosWalker {

    protected $class_names = [
        'menu_item' => 'hd-Menu_Item',
        'menu_item_link' => 'hd-Menu_Item_Link',
        'submenu' => 'hd-Submenu',
        'submenu_item' => 'hd-Submenu_Item',
        'submenu_item_link' => 'hd-Submenu_Item_Link',
    ];

}
