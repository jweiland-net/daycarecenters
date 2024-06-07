# TYPO3 Extension `daycarecenters`

[![Packagist][packagist-logo-stable]][extension-packagist-url]
[![Latest Stable Version][extension-build-shield]][extension-ter-url]
[![Total Downloads][extension-downloads-badge]][extension-packagist-url]
[![Monthly Downloads][extension-monthly-downloads]][extension-packagist-url]
[![TYPO3 12.4][TYPO3-shield]][TYPO3-12-url]

![Build Status](https://github.com/jweiland-net/daycarecenters/workflows/CI/badge.svg)

With `daycarecenters` you can create, manage and display day-care-center entries.

## 1 Features

* Create and manage day-care-centers

## 2 Usage

### 2.1 Installation

#### Installation using Composer

The recommended way to install the extension is using Composer.

Run the following command within your Composer based TYPO3 project:

```
composer require jweiland/daycarecenters
```

#### Installation as extension from TYPO3 Extension Repository (TER)

Download and install `daycarecenters` with the extension manager module.

### 2.2 Minimal setup

1) Include the static TypoScript of the extension.
2) Create kita and district records on a sysfolder.
3) Add daycarecenters plugin on a page and select at least the sysfolder as startingpoint.


<!-- MARKDOWN LINKS & IMAGES -->

[extension-build-shield]: https://poser.pugx.org/jweiland/daycarecenters/v/stable.svg?style=for-the-badge

[extension-downloads-badge]: https://poser.pugx.org/jweiland/daycarecenters/d/total.svg?style=for-the-badge

[extension-monthly-downloads]: https://poser.pugx.org/jweiland/daycarecenters/d/monthly?style=for-the-badge

[extension-ter-url]: https://extensions.typo3.org/extension/daycarecenters/

[extension-packagist-url]: https://packagist.org/packages/jweiland/daycarecenters/

[packagist-logo-stable]: https://img.shields.io/badge/--grey.svg?style=for-the-badge&logo=packagist&logoColor=white

[TYPO3-12-url]: https://get.typo3.org/version/12

[TYPO3-shield]: https://img.shields.io/badge/TYPO3-12.4-green.svg?style=for-the-badge&logo=typo3
