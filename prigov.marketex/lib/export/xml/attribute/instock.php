<?php

namespace Prigov\Marketex\Export\Xml\Attribute;

use Yandex\Market\Export\Xml\Attribute\Base;
use Yandex\Market;

class Instock extends Base
{
    public function getDefaultParameters()
    {
        return [
            'name' => 'instock',
            'primary' => true,
        ];
    }
}