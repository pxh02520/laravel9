<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\Label\Alignment\LabelAlignmentCenter;
use Endroid\QrCode\Writer\PngWriter;

class GenerateQR extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lab:generateqr';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // QRコードの生成
        $result = Builder::create()
            ->writer(new PngWriter()) // PNG形式で生成
            ->data('12345678901234567890') // データ（例: URL）
            ->encoding(new Encoding('UTF-8')) // エンコーディング
            ->errorCorrectionLevel(new ErrorCorrectionLevelHigh()) // エラー補正レベル
            ->size(250) // サイズ
            ->margin(30) // マージン
            ->build();

        // 保存先のパス
        $filePath = storage_path('app/public/qrcode.jpeg');

        // JPEGとして保存
        $image = imagecreatefromstring($result->getString());
        imagejpeg($image, $filePath, 90);
        imagedestroy($image);

        echo "QRコードを生成しました。";
    }
}
