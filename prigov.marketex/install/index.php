<?php

IncludeModuleLangFile(__FILE__);

use Bitrix\Main\EventManager;
use Bitrix\Main\Loader;
use Bitrix\Main\LoaderException;
use Prigov\Marketex\EventHandler;

class Prigov_marketex extends CModule
{
    public $MODULE_ID = 'prigov.marketex';

    public $MODULE_VERSION;

    public $MODULE_VERSION_DATE;

    public $MODULE_NAME;

    public $MODULE_DESCRIPTION;

    public $errors;

    public function __construct()
    {
        $this->MODULE_VERSION = '0.0.1';
        $this->MODULE_VERSION_DATE = '13.09.2021';
        $this->MODULE_NAME = '���������� ������.������ ��� �������. �������� � ����';
        $this->MODULE_DESCRIPTION = '���������� �������� � ��� � ����� � ���';
        $this->PARTNER_NAME = '����� �����';
        $this->PARTNER_URI = 'https://prigov.info';
    }

    public function DoInstall()
    {
        RegisterModule($this->MODULE_ID);

        return true;
    }

    public function DoUninstall()
    {
        UnRegisterModule($this->MODULE_ID);

        return true;
    }

    public function InstallEvents()
    {
        /**
         * �������� ������ ��������� �������.
         * ����� ��� �������� �� �������
         * @var EventManager
         */
        $eventManager = EventManager::getInstance();

        $eventManager->registerEventHandler(
            'yandex.market',
            'onExportXmlFormatBuildList',
            $this->MODULE_ID,
            EventHandler::class,
            'onExportXmlFormatBuildList'
        );
    }
}
