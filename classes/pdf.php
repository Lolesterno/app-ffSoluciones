<?php 

namespace classes;

use Dompdf\Dompdf;
use Dompdf\Options;

class PDF  {

    public function generarPDF($html) {

        $pdf = new Dompdf();

        $opciones = new Options();
        $opciones->set('isRemoteEnable', true);
        $opciones->set('isHtml5ParserEnabled', true);

        $pdf->setOptions($opciones);

        $pdf->loadHtml($html);

        $pdf->setPaper('B2', 'portrait');

        $pdf->render();

        $pdf->stream('lista_ff_solsa_'. date('Y'), array("Attachment" => true));
        
    }
}