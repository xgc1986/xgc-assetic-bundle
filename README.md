[![Latest Stable Version](https://poser.pugx.org/xgc/assetic-bundle/v/stable)](https://packagist.org/packages/xgc/assetic-bundle)
[![License](https://poser.pugx.org/xgc/assetic-bundle/license)](https://packagist.org/packages/xgc/assetic-bundle)
[![Downloads](https://poser.pugx.org/xgc/assetic-bundle/downloads)](https://packagist.org/packages/xgc/assetic-bundle)
[![Build Status](https://travis-ci.org/xgc1986/xgc-assetic-bundle.svg?branch=master)](https://travis-ci.org/xgc1986/xgc-assetic-bundle)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/xgc1986/xgc-assetic-bundle/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/xgc1986/xgc-assetic-bundle/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/xgc1986/xgc-assetic-bundle/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/xgc1986/xgc-assetic-bundle/?branch=master)

# Xgc Assetic Bundle

Allows to manage with easy js and css resources

## Installation

```bash
$ composer require xgc/assetic-bundle
```

## Usage

[Online](http://xgc-samples.herokuapp.com)

```yaml
xgc_assetics:
    
  my_assetic_collection:
    - 'dependency1'
    - 'http://example.com/file.js'
    - 'http://example.com/file.css'
    
  dependency1:
    - 'http://example.com/dependant.js'
```

```twig
<html>
<head>
    {{ xgc_assetics('my_assetic_collection') }}
</head>
<body>...</body>
</html>
```
