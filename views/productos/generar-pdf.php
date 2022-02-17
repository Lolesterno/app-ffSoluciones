<?php

use classes\PDF;

require_once __DIR__. '/../../includes/app.php';

    ob_start();

    include (__DIR__. '/template.php');

    $html = ob_get_clean();

    $pdf = new PDF();

    $pdf->generarPDF($html);

    debugear($html);