<?php

use NumairAwan\EthereumGasTracker\EthereumGasPrice;
use PHPUnit\Framework\TestCase;

class EthereumGasPriceTest extends TestCase
{
    public function testGasPriceConversionToWei()
    {
        $gasPrice = new EthereumGasPrice();

        $gweiPrice = 20;
        $expectedWeiPrice = '20000000000';

        $this->assertEquals($expectedWeiPrice, $gasPrice->toWei($gweiPrice));
    }

    public function testGasPriceConversionToHex()
    {
        $gasPrice = new EthereumGasPrice();

        $weiPrice = '20000000000';
        $expectedHexPrice = '0x4c4b40';

        $this->assertEquals($expectedHexPrice, $gasPrice->toHex($weiPrice, true));
    }

    public function testGasPriceRetrieval()
    {
        $gasPrice = new EthereumGasPrice();

        $gasPrices = $gasPrice->getGasPrices();

        $this->assertIsObject($gasPrices);
        $this->assertObjectHasAttribute('safeGas', $gasPrices);
        $this->assertObjectHasAttribute('proposeGas', $gasPrices);
        $this->assertObjectHasAttribute('fastGas', $gasPrices);
    }

    public function testGasPriceToArray()
    {
        $gasPrice = new EthereumGasPrice();

        $gasPricesArray = $gasPrice->toArray();

        $this->assertIsArray($gasPricesArray);
        $this->assertArrayHasKey('safeGas', $gasPricesArray);
        $this->assertArrayHasKey('proposeGas', $gasPricesArray);
        $this->assertArrayHasKey('fastGas', $gasPricesArray);
    }

    public function testJsonValidity()
    {
        $gasPrice = new EthereumGasPrice();

        $etherScanGas = json_encode($gasPrice->getGasPrices());

        $this->assertTrue($gasPrice->isValidJson($etherScanGas));
    }
}
