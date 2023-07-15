<p align="center">
    <img src="https://raw.githubusercontent.com/NumairAwan/eth-gas-tracker-php/main/art/screenshot.png" width="600" alt="Eth Gas Tracker PHP">
    <p align="center">
        <a href="https://packagist.org/packages/numairawan/eth-gas-tracker-php"><img alt="Total Downloads" src="https://img.shields.io/packagist/dt/numairawan/eth-gas-tracker-php"></a>
        <a href="https://packagist.org/packages/numairawan/eth-gas-tracker-php"><img alt="Latest Version" src="https://img.shields.io/packagist/v/numairawan/eth-gas-tracker-php"></a>
        <a href="https://packagist.org/packages/numairawan/eth-gas-tracker-php"><img alt="License" src="https://img.shields.io/github/license/numairawan/eth-gas-tracker-php"></a>
    </p>
</p>

------
**eth-gas-tracker-php** is a powerful PHP library that provides developers with an effortless way to retrieve live Ethereum gas prices, empowering them to optimize transactions and smart contracts on the Ethereum network.

## Features

- 🚀 Retrieve live Ethereum gas prices with ease.
- ⛽️ Obtain up-to-date and accurate gas price data.
- 💪 Fine-tune transaction optimization based on real-time gas prices.
- 🤝 Seamless integration into existing PHP projects.
- 📚 Comprehensive documentation and code examples for easy implementation.

## Installation

To install the library, you can use [Composer](https://getcomposer.org/) and run the following command:

```bash
composer require numairawan/eth-gas-tracker-php
```


### Usage
To retrieve live Ethereum gas prices, follow these simple steps:

```php
use NumairAwan\EthGasTracker\EthereumGasPrice;

// Instantiate the EthereumGasPrice
$gasPrice = new EthereumGasPrice();

// Display the gas prices
echo "Gas Prices:\n";
echo "Safe Gas Price: " . $gasPrice->safeGas . " Gwei\n";

// Get gas prices as an associative array
$pricesArray = $gasPrice->toArray();

// Gas prices in array
echo "Fast Gas Price: " . $pricesArray['fastGas'] . " Gwei\n";
```

#### `Utilities`

```php
// Convert gas prices to Wei
$fastGasPriceWei = $gasPrice->toWei($gasPrice->fastGas);
echo "Fast Gas Price (Wei): " . $fastGasPriceWei . PHP_EOL;

// Convert gas prices to Hexadecimal with '0x' prefix (don't pass second parameter to just get hex)
$proposeGasPriceHex = $gasPrice->toHex($gasPrice->proposeGas, true);
echo "Propose Gas Price (Hex): " . $proposeGasPriceHex . PHP_EOL;
```

### Contributing
Contributions are welcome! Feel free to fork the repository and submit pull requests as well.

### License
This project is licensed under the **[MIT license](https://opensource.org/licenses/MIT)**.


## Connect with Me

Feel free to reach out to me for any project-related queries or collaborations. I'm always happy to connect and discuss ideas!

[<img align="left" alt="Telegram" width="32px" src="https://upload.wikimedia.org/wikipedia/commons/8/82/Telegram_logo.svg" />](https://t.me/NumairAwan)
[<img align="left" alt="WhatsApp" width="32px" src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/WhatsApp.svg/512px-WhatsApp.svg.png?20220228223904" />](https://wa.me/+923164700904)

