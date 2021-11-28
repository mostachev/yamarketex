<?php

use Prigov\Marketex\EventHandler;
use Prigov\Marketex\Export\Xml\Format\Ozon\Pricecost;
use Bitrix\Main;

Main\Loader::registerAutoLoadClasses('prigov.marketex', [
    EventHandler::class                                  => 'lib/eventhandler.php',
    'Prigov\Marketex\Export\Xml\Format\Ozon\Pricecost'   => 'lib/lib/export/xml/format/ozon/pricecost.php',
    'Prigov\Marketex\Export\Xml\Tag\PremiumPrice'        => 'lib/export/xml/tag/premiumprice.php',
    'Prigov\Marketex\Export\Xml\Tag\Outlets'             => 'lib/export/xml/tag/outlets.php',
    'Prigov\Marketex\Export\Xml\Tag\Outlet'              => 'lib/export/xml/tag/outlet.php',
    'Prigov\Marketex\Export\Xml\Attribute\Instock'       => 'lib/export/xml/attribute/instock.php',
    'Prigov\Marketex\Export\Xml\Attribute\WireHouseName' => 'lib/export/xml/attribute/wirehousename.php',
]);