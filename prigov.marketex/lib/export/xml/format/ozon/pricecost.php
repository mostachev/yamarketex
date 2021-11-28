<?php

namespace Prigov\Marketex\Export\Xml\Format\Ozon;

use Bitrix\Main\Loader;
use Prigov\Marketex\Export\Xml\Tag\Outlet;
use Yandex\Market\Export\Xml\Format\YandexMarket\Simple;
use Yandex\Market\Export\Xml;
use Yandex\Market\Data;
use Prigov\Marketex\Export\Xml\Tag;

Loader::includeModule('yandex.market');

class Pricecost extends Simple
{
    public function getDocumentationLink()
    {
        return 'https://seller-edu.ozon.ru/docs/work-with-goods/fidi.html';
    }

    public function getContext()
    {
        return [
            'CONVERT_CURRENCY' => Data\Currency::getCurrency('RUB'),
        ];
    }

    public function getRoot()
    {
        $result = parent::getRoot();

        $this->sanitizeRoot($result);

        return $result;
    }

    protected function sanitizeRoot(Xml\Tag\Base $root)
    {
        $shop = $root->getChild('shop');

        if ($shop === null) {
            return;
        }

        $this->removeChildTags($shop, ['cpa', 'enable_auto_discounts', 'categories', 'gifts', 'promos']);
    }

    public function getCurrency()
    {
        return Xml\Format\YandexMarket\Simple::getCurrency();
    }

    public function getCategory()
    {
        return null;
    }

    public function getOffer()
    {
        return new Xml\Tag\Offer([
                                     'name'       => 'offer',
                                     'required'   => false,
                                     'visible'    => true,
                                     'attributes' => [
                                         new Xml\Attribute\Id(['required' => false]),
                                     ],
                                     'children'   => [
                                         new Xml\Tag\Price(['required' => true]),
                                         new Xml\Tag\OldPrice(['visible' => true]),
                                         new Tag\PremiumPrice(['visible' => true]),
                                         new Tag\Outlets(['visible' => false]),
                                         new Outlet([
                                                        'name'        => 'outlet',
                                                        'wrapper_name' => 'outlets',
                                                        'multiple'    => true,
                                                        'required'    => false,
                                                        'visible'     => false
                                                    ])
                                     ]
                                 ]);
    }
}