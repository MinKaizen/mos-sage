<?php declare(strict_types=1);

namespace App\Classes;

class MobileNavMenuWalker extends MosWalker {

    protected $class_names = [
        'menu_item' => 'mn-Menu_Item',
        'menu_item_link' => 'mn-Menu_Item_Link',
        'submenu' => 'mn-Submenu',
        'submenu_item' => 'mn-Submenu_Item',
        'submenu_item_link' => 'mn-Submenu_Item_Link',
    ];

}
