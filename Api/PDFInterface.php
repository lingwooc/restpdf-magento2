<?php

/**
 * Copyright 2019 ThousandMonkeys. All rights reserved.
 */

namespace Thousandmonkeys\Restpdf\Api;


interface PDFInterface
{
    /**
     * Return base64 encoded pdf where invoice is under key "pdf".
     *
     * @api
     * @param int $id number of the invoice
     * @param int $template template id of the invoice
     * @return Thousandmonkeys\Restpdf\Api\PDFResponseInterface pdf
     */
    public function pdf($id, $template);
}