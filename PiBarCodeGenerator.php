<?php

declare(strict_types=1);

namespace PiBarCode;

class PiBarCodeGenerator
{
    static function generate(
        string $type,
        string $code,
        int $height = 80,
        int $width = 0,
        string $color = '#000000',
        string $bgColor = '#FFFFFF',
        bool $readable = false,
        bool $showType = false
    ): void {
        $type = strtoupper($type);

        $barcode = new PiBarCode();
        $barcode->setSize($height, $width);

        if ($readable === false) {
            $barcode->setText('');
        }
        if ($showType === false) {
            $barcode->hideCodeType();
        }

        if ($color !== '') {
            if ($bgColor !== '') {
                $barcode->setColors($color, $bgColor);
            } else {
                $barcode->setColors($color);
            }
        }

        $barcode->setType($type);
        $barcode->setCode($code);

        $barcode->showBarcodeImage();
    }
}
