# restpdf-magento2
Module for magento2 to allow invoice pdfs from eadesignro/module-pdfgenerator to be obtained through a rest end point. It requires (and installs) eadesignro/module-pdfgenerator to actually create the pdfs.

Tested and working on magento 2.2.7 and 2.3.7.

# Installation
- composer require thousandmonkeys/m2-restpdf-module
- php bin/magento setup:upgrade
- php bin/magento setup:di:compile

# Usage
There is now a rest end point at /V1/invoices/:id/pdf/:template 
 - :id is the invoice id
 - :template is the template id (from eadesignro/module-pdfgenerator)

The output is in the form 
```
{
   "pdf": "xxxxx"
}
```
Where xxx is the pdf encoded with base64. You can quickly check the output by putting it in a file called pdf.json and opening json.pdf after running this command
`cat pdf.json | jq -r '.pdf' | base64 -d > json.pdf`

# Getting module-pdfgenerator to actually work
You need to patch eadesignro/module-pdfgenerator for it to work as its been abandoned. 

These composer patches fix it for the most part (emailing pdfs is still probably broken for instance).
```
            "eadesignro/module-pdfgenerator": {
                "Pull: https://github.com/EaDesgin/magento2-pdf-generator2/pull/101": "https://patch-diff.githubusercontent.com/raw/EaDesgin/magento2-pdf-generator2/pull/101.patch",
                "Pull: https://patch-diff.githubusercontent.com/raw/lingwooc/magento2-pdf-generator2/pull/1": "https://patch-diff.githubusercontent.com/raw/lingwooc/magento2-pdf-generator2/pull/1.patch"
            },
```
