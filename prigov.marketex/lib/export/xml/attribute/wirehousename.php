<?php

namespace Prigov\Marketex\Export\Xml\Attribute;

use Yandex\Market\Export\Xml\Attribute\Base;
use Yandex\Market;

class WireHouseName extends Base
{
    public function getDefaultParameters()
    {
        return [
            'name'    => 'warehouse_name',
            'primary' => true,
        ];
    }
}