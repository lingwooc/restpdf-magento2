<?php

/**
 * Copyright 2019 ThousandMonkeys. All rights reserved.
 */

namespace Thousandmonkeys\Restpdf\Model;

use Thousandmonkeys\Restpdf\Api\PDFInterface;

use Eadesigndev\Pdfgenerator\Helper\Pdf;
use Eadesigndev\Pdfgenerator\Controller\Adminhtml\Order\Abstractpdf;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\ForwardFactory;
use Magento\Email\Model\Template\Config;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\App\Response\Http\FileFactory;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Registry;
use Magento\Framework\Stdlib\DateTime\DateTime;
use Eadesigndev\Pdfgenerator\Model\PdfgeneratorRepository;
use Magento\Sales\Model\Order\InvoiceRepository;


/**
 * Defines the implementation class of the calculator service contract.
 */
class PDFMaker implements PDFInterface
{
    /**
     * @var Pdf
     */
    private $helper;

    /**
     * @var PdfgeneratorRepository
     */
    private $pdfGeneratorRepository;

    /**
     * @var InvoiceRepository
     */
    private $invoiceRepository;

    /**
     * PDF API constructor.
     * @param Pdf $helper
     * @param PdfgeneratorRepository $pdfGeneratorRepository
     * @param InvoiceRepository $invoiceRepository
     */
    public function __construct(
            Pdf $helper,
            PdfgeneratorRepository $pdfGeneratorRepository,
            InvoiceRepository $invoiceRepository
    ) {
        $this->helper = $helper;
        $this->pdfGeneratorRepository = $pdfGeneratorRepository;
        $this->invoiceRepository = $invoiceRepository;
    }

    public function pdf($invoiceId, $templateId){


        $templateModel = $this->pdfGeneratorRepository->getById($templateId);

        if (!$templateModel) {
            throw new \Magento\Sales\Exception(
                    __('Could not find template.')
            );
        }

        $invoice = $this->invoiceRepository
                ->get($invoiceId);
        if (!$invoice) {
            throw new \Magento\Sales\Exception(
                    __('Could not find invoice.')
            );
        }

        $helper = $this->helper;

        $helper->setInvoice($invoice);
        $helper->setTemplate($templateModel);

        $pdfFileData = $helper->template2Pdf();


        return new PDFResponse(base64_encode($pdfFileData['filestream']));
    }

}