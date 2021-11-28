<?php

namespace Prigov\Marketex;

use Bitrix\Main\Event;
use Bitrix\Main\EventResult;
use Prigov\Marketex\Export\Xml\Format\Ozon\Pricecost;

class EventHandler
{
    public static function onExportXmlFormatBuildList(Event $event)
    {
        $arService = [
            'SERVICE'   => 'Ozon',
            'TYPE_LIST' => [
                'pricecost' => Pricecost::class
            ]
        ];

        return new EventResult(EventResult::SUCCESS, $arService);
    }
}