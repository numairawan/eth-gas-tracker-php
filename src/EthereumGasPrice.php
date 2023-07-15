<?php

namespace NumairAwan\EthereumGasTracker;

/**
 * EthereumGasPrice class for retrieving live Ethereum gas prices.
 */
class EthereumGasPrice
{
    private $gasPrices;

    /**
     * Constructor method. Fetches gas prices from the API.
     */
    public function __construct()
    {
        $this->fetchGasPrices();
    }

    /**
     * Convert a gas price from Gwei to Wei.
     *
     * @param int $price Gas price in Gwei
     * @return string|float Converted gas price in Wei
     */
    public function toWei($price)
    {
        return bcmul($price, '1000000000');
    }

    /**
     * Converts the given gas price from Wei to Hexadecimal format.
     *
     * @param int|string $price
     * @param bool $prefix Whether to include '0x' prefix in the result
     * @return string
     */
    public function toHex($price, $prefix = false)
    {
        $hex = dechex($price);

        if ($prefix) {
            return '0x' . $hex;
        }

        return $hex;
    }

    /**
     * Returns the gas prices as an associative array.
     *
     * @return array
     */
    public function toArray()
    {
        return json_decode(json_encode($this->gasPrices), true);
    }

    /**
     * Fetch gas prices from the API.
     */
    private function fetchGasPrices()
    {

        $APIURL = "https://eth-gas-tracker.numairawan.com/api";

        if (function_exists('file_get_contents')) {
            $etherScanGas = @file_get_contents($APIURL);
        } else {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $APIURL);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $etherScanGas = curl_exec($ch);
            curl_close($ch);
        }

        if ($this->isValidJson($etherScanGas)) {

            $gasPrices = json_decode($etherScanGas);
            $this->gasPrices = $gasPrices;
        }
    }

    /**
     * Returns the gas prices as an object.
     *
     * @return object
     */
    public function getGasPrices()
    {
        return $this->gasPrices;
    }

    /**
     * Check if a string is a valid JSON.
     *
     * @param string $jsonString JSON string to validate
     * @return bool True if the JSON is valid, false otherwise
     */
    private function isValidJson($jsonString)
    {
        json_decode($jsonString);
        return (json_last_error() === JSON_ERROR_NONE);
    }
}
