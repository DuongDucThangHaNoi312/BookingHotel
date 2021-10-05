<?php

namespace BookingHotel\Core;

use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Writer\Result\ResultInterface;

trait TrainQRCode
{
    /**
     * @throws \Exception
     */
    public function getURLQRCode(string $tokenPayload): string
    {
        return $this->createQRCode($tokenPayload)->getDataUri();
    }

    /**
     * @throws \Exception
     */
    public function createQRCode(string $tokenPayload): ResultInterface
    {
        $writer = new PngWriter();
        $qrCode = QrCode::create($tokenPayload)
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
            ->setSize(300)
            ->setMargin(10)
            ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->setForegroundColor(new Color(0, 0, 0))
            ->setBackgroundColor(new Color(255, 255, 255));
        $logo = Logo::create('./assets/IMG/hotel.jpeg')
            ->setResizeToWidth(50);

        $label = Label::create('QR code check in hotel')
            ->setTextColor(new Color(255, 0, 0));

        return $writer->write($qrCode, $logo, $label);
    }
}