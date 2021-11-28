<?php

namespace Prigov\Marketex\Export\Xml\Tag;

use Bitrix\Main\Diag\Debug;
use Yandex\Market;
use Yandex\Market\Export\Xml\Tag\Base;
use Prigov\Marketex\Export\Xml\Attribute;

class Outlet extends Base
{
    public function getDefaultParameters()
    {
        return [
            'name'        => 'outlet',
            'empty_value' => true,
            'attributes'  => [
                new Attribute\Instock(['required' => true]),
                new Attribute\WireHouseName(['required' => true]),
            ],
        ];
    }

    public function getDefaultSource(array $context = [])
    {
        return Market\Export\Entity\Manager::TYPE_IBLOCK_ELEMENT_PROPERTY;
    }

   /* public function exportNode(
        $value,
        array $context,
        \SimpleXMLElement $parent,
        Market\Result\XmlNode $nodeResult = null,
        $settings = null
    ) {
        $result = $parent->addChild($this->name);

        //$result->addAttribute('id', $value);

        return $result;
    }*/
}