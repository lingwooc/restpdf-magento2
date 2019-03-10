<?php

/**
 * Copyright 2019 ThousandMonkeys. All rights reserved.
 */

namespace Thousandmonkeys\Restpdf\Model;

use Thousandmonkeys\Restpdf\Api\PDFResponseInterface;

/**
 * Defines the implementation class of the calculator service contract.
 */
class PDFResponse implements PDFResponseInterface {

    /**
     * @var pdf
     */
    private $pdf;

    /**
     * Printpdf constructor.
     *
     * @param string $pdf
     *
     */
    public function __construct(string $pdf) {
        $this->pdf = $pdf;
    }

    public function getPdf() {
        return $this->pdf;
    }
}