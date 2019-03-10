<?php

/**
 * Copyright 2019 ThousandMonkeys. All rights reserved.
 */

namespace Thousandmonkeys\Restpdf\Api;

interface PDFResponseInterface
{
    /**
     * @return string
     **/
    public function getPdf();

}