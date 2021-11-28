<?php

namespace Prigov\Marketex\Export\Xml\Tag;

use Yandex\Market;
use Yandex\Market\Export\Xml\Tag\Base;

class Outlets extends Base
{
    public function getDefaultParameters()
    {
        return [
            'name'        => 'outlets',
            'empty_value' => true
            // 'children' => new Outlet(['visible' => true])
        ];
    }

    public function exportNode(
        $value,
        array $context,
        \SimpleXMLElement $parent,
        Market\Result\XmlNode $nodeResult = null,
        $settings = null
    ) {
        $result = $parent->addChild($this->name);

        return $result;
    }

    public function validate(
        $value,
        array $context,
        $siblingsValues = null,
        Market\Result\XmlNode $nodeResult = null,
        $settings = null
    ) {
        return true;
    }
}