# restpdf-magento2
Module for magento2 to allow invoice pdfs from eadesignro/module-pdfgenerator to be obtained through a rest end point. It requires (and installs) eadesignro/module-pdfgenerator to actually create the pdfs.

Tested and working on magento 2.2.7

# Installation
- composer require thousandmonkeys/m2-restpdf-module
- php bin/magento setup:upgrade
- php bin/magento setup:di:compile

# Usage
There is now a rest end point at /V1/invoices/:id/pdf/:template 
 - :id is the invoice id
 - :template is the template id (from eadesignro/module-pdfgenerator)
