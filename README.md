# TYPO3 Extension `daycarecenters`

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
