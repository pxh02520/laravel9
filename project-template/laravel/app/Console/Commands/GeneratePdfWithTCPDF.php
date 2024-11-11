<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Elibyy\TCPDF\Facades\TCPDF;

class GeneratePdfWithTCPDF extends Command
{
    // コマンドの名前と説明
    protected $signature = 'generate:pdf';
    protected $description = 'Generate a PDF file using TCPDF and save it to a file';

    /*
    // コマンドが実行されたときの処理
    public function handle()
    {
        $html = '<h1 style="color:red;">Hello World</h1>';

        $pdf = new TCPDF();
        $pdf::SetTitle('Hello World');
        $pdf::AddPage();
        $pdf::writeHTML($html, true, false, true, false, '');

        // PDFファイルをサーバーに保存
        $filePath = storage_path('app\public\generated_pdf.pdf'); // ファイルパス
        $pdf::Output($filePath, 'F');
        
        // 完了メッセージ
        $this->info("PDF has been generated and saved to: {$filePath}");
    }
    */

    // コマンドが実行されたときの処理
    public function handle()
    {
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf::SetTitle('Hello World');
        $pdf::setPrintHeader(false);
        $pdf::setPrintFooter(false);
        $pdf::setMargins(10, 5, 10);
        $pdf::SetAutoPageBreak(false);
        $pdf::setImageScale(PDF_IMAGE_SCALE_RATIO);

        $pdf::AddPage();
        $pdf::SetFont('kozgopromedium', '', 10);

        $text1 = <<<EOD
A4印刷用<br>
EOD;
        
        $pdf::writeHTML($text1, false, false, false, false, '');

        $pdf::SetFont('kozgopromedium', 'B', 12);

        $text2 = <<<EOD
<div height="2px"></div>
<table border="1" cellpadding="5" cellspacing="0">
  <tr style="background-color: #FFFFFF;">
    <td align="center">ＧＵＥＳＴ</td>
  </tr>
</table>
EOD;

        $pdf::writeHTML($text2, false, false, false, false, '');

        // PDFファイルをサーバーに保存
        $filePath = storage_path('app\public\generated_pdf.pdf'); // ファイルパス
        $pdf::Output($filePath, 'F');
        
        // 完了メッセージ
        $this->info("PDF has been generated and saved to: {$filePath}");
    }

}
