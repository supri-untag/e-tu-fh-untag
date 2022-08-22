<?php
require_once __DIR__.'/../../vendor/autoload.php';

$generatorJPG = new \Picqer\Barcode\BarcodeGeneratorJPG();
file_put_contents(__DIR__.'/../../public/assets/img/barcode/xxx1.jpg',$generatorJPG->getBarcode('11111', $generatorJPG::TYPE_CODABAR));
