<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var list<string>
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------

    public $coffeeGradeRules = [];
    public $valuationRules = [];
    public $supplierValidationRules = [];
    public $updateSupplierValidationRules = [];
    public $salesReportValidationRules = [];
    public $salesUpdateReportValidationRules = [];
    public $buyerInfoValidationRules = [];
    public $buyerUpdateInfoValidationRules = [];
    public $addStaffRules = [];
    public function __construct()
    {
        $this->setCoffeeGradesRules();
        $this->setValuationRules();
        $this->setAddStaffRules();

        $this->setSupplierValidationRules();
        $this->setUpdateSupplierValidationRules();
        $this->setSalesReportValidationRules();
        $this->setUpdateSalesValidationRules();
        $this->setBuyerInfoValidationRules();
        $this->setBuyerUpdateInfoValidationRules();
    }

    /**
     * Set Coffee Grades Rules
     *
     * @return void
     */
    public function setCoffeeGradesRules(): void
    {
        $this->coffeeGradeRules = [
            'grdName' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Grade Name is required.',
                ],
            ],
            'grdCatId' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Grade Category is required.',
                ],
            ],
            'grdUnit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Grade Unit Category is required.',
                ],
            ],
            'grdGroup' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Grade  is required.',
                ]
            ],
            'grdCode' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Grade Code is required.',
                ]
            ],
        ];
    }

    /**
     * Sets validation rules for Valutaion
     *
     * @return void
     */
    public function setValuationRules(): void
    {
        $this->valuationRules = [
            'date' => [
                'label' => 'Date',
                'rules' => 'required|valid_date',
                'errors' => [
                    'required' => 'Date is required.',
                    'valid_date' => 'Please enter a valid date.',
                ],
            ],
            'supplier' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Supplier is required.',
                ],
            ],
            'grn' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Grn field is required.',
                ],
            ],
            'moisture' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Moisture field is required.',
                ],
            ],
            'items.*' => [
                'label' => 'Items',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Item field is required.',
                ],
            ],
            'quantities.*' => [
                'label' => 'Quantities',
                'rules' => 'required|regex_match[/^\d+(\.\d+)?$/]',
                'errors' => [
                    'required' => 'Each quantity is required.',
                    'regex_match' => 'Quantity must be a positive number (integer or decimal).',
                ],
            ],

            'prices.*' => [
                'label' => 'Prices',
                'rules' => 'required|decimal',
                'errors' => [
                    'required' => 'Each price is required.',
                    'decimal' => 'Price must be a valid decimal number.',
                ],
            ],

        ];
    }
    /**
     * Set Supplier Validation Rules
     *
     * @return void
     */
    public function setSupplierValidationRules(): void
    {
        $this->supplierValidationRules = [
            'supplierName' => [
                'rules' => 'required|string|max_length[255]',
                'errors' => [
                    'required' => 'Supplier name is required.',
                    'string' => 'Supplier name must be a string.',
                    'max_length' => 'Supplier name cannot exceed 255 characters.',
                ],
            ],
            'contactPerson' => [
                'rules' => 'required|string|max_length[255]',
                'errors' => [
                    'required' => 'Contact person is required.',
                    'string' => 'Contact person must be a string.',
                    'max_length' => 'Contact person cannot exceed 255 characters.',
                ],
            ],
            'supplierDistrict' => [
                'rules' => 'required|string|max_length[100]',
                'errors' => [
                    'required' => 'District is required.',
                    'string' => 'District must be a string.',
                    'max_length' => 'District cannot exceed 100 characters.',
                ],
            ],
            'supplierTel1' => [
                'rules' => 'required|numeric|min_length[10]|max_length[15]',
                'errors' => [
                    'required' => 'Primary telephone is required.',
                    'numeric' => 'Primary telephone must be a number.',
                    'min_length' => 'Primary telephone must be at least 10 digits.',
                    'max_length' => 'Primary telephone cannot exceed 15 digits.',
                ],
            ],
            'supplierTel2' => [
                'rules' => 'permit_empty|numeric|min_length[10]|max_length[15]',
                'errors' => [
                    'numeric' => 'Secondary telephone must be a number.',
                    'min_length' => 'Secondary telephone must be at least 10 digits.',
                    'max_length' => 'Secondary telephone cannot exceed 15 digits.',
                ],
            ],
            'supplierEmail' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email is required.',
                    'valid_email' => 'Please provide a valid email address.',
                ],
            ],
            'supplierCategory' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'Category ID is required.',
                    'integer' => 'Category ID must be an integer.',
                ],
            ],
            'supplierCurrency' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'Currency ID is required.',
                    'integer' => 'Currency ID must be an integer.',
                ],
            ],
            'conatctRole' => [
                'rules' => 'required|string|max_length[100]',
                'errors' => [
                    'required' => 'Role is required.',
                    'string' => 'Role must be a string.',
                    'max_length' => 'Role cannot exceed 100 characters.',
                ],
            ],
            'supplierSubcounty' => [
                'rules' => 'permit_empty|string|max_length[100]',
                'errors' => [
                    'string' => 'Subcounty must be a string.',
                    'max_length' => 'Subcounty cannot exceed 100 characters.',
                ],
            ],
            'supplierStreet' => [
                'rules' => 'permit_empty|string|max_length[255]',
                'errors' => [
                    'string' => 'Street must be a string.',
                    'max_length' => 'Street cannot exceed 255 characters.',
                ],
            ],
        ];
    }

    /*
    * Set Supplier Validation Rules
    *
    * @return void
    */
    public function setUpdateSupplierValidationRules(): void
    {
        $this->updateSupplierValidationRules = [
            'sName' => [
                'rules' => 'required|string|max_length[255]',
                'errors' => [
                    'required' => 'Supplier name is required.',
                    'string' => 'Supplier name must be a string.',
                    'max_length' => 'Supplier name cannot exceed 255 characters.',
                ],
            ],
            'sContactPerson' => [
                'rules' => 'required|string|max_length[255]',
                'errors' => [
                    'required' => 'Contact person is required.',
                    'string' => 'Contact person must be a string.',
                    'max_length' => 'Contact person cannot exceed 255 characters.',
                ],
            ],
            'sDistrict' => [
                'rules' => 'required|string|max_length[100]',
                'errors' => [
                    'required' => 'District is required.',
                    'string' => 'District must be a string.',
                    'max_length' => 'District cannot exceed 100 characters.',
                ],
            ],
            'sTel1' => [
                'rules' => 'required|numeric|min_length[10]|max_length[15]',
                'errors' => [
                    'required' => 'Primary telephone is required.',
                    'numeric' => 'Primary telephone must be a number.',
                    'min_length' => 'Primary telephone must be at least 10 digits.',
                    'max_length' => 'Primary telephone cannot exceed 15 digits.',
                ],
            ],
            'sTel2' => [
                'rules' => 'permit_empty|numeric|min_length[10]|max_length[15]',
                'errors' => [
                    'numeric' => 'Secondary telephone must be a number.',
                    'min_length' => 'Secondary telephone must be at least 10 digits.',
                    'max_length' => 'Secondary telephone cannot exceed 15 digits.',
                ],
            ],
            'sEmail' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email is required.',
                    'valid_email' => 'Please provide a valid email address.',
                ],
            ],
            'sCategory' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'Category ID is required.',
                    'integer' => 'Category ID must be an integer.',
                ],
            ],
            'sContactRole' => [
                'rules' => 'required|string|max_length[100]',
                'errors' => [
                    'required' => 'Role is required.',
                    'string' => 'Role must be a string.',
                    'max_length' => 'Role cannot exceed 100 characters.',
                ],
            ],
            'sSubCounty' => [
                'rules' => 'permit_empty|string|max_length[100]',
                'errors' => [
                    'string' => 'Subcounty must be a string.',
                    'max_length' => 'Subcounty cannot exceed 100 characters.',
                ],
            ],
            'sStreet' => [
                'rules' => 'permit_empty|string|max_length[255]',
                'errors' => [
                    'string' => 'Street must be a string.',
                    'max_length' => 'Street cannot exceed 255 characters.',
                ],
            ],
        ];
    }

    /**
     * Set Sales Report Validation Rules
     *
     * @return void
     */
    public function setSalesReportValidationRules(): void
    {

        $this->salesReportValidationRules = [
            'salesReportNo' => [
                'rules' => 'required|max_length[20]',
                'errors' => [
                    'required' => 'Sales report number is required.',
                    'max_length' => 'Sales report number cannot exceed 20 characters.',
                ],
            ],
            'date' => [
                'rules' => 'required|valid_date[Y-m-d]',
                'errors' => [
                    'required' => 'The date is required.',
                    'valid_date' => 'The date must be in Y-m-d format.',
                ],
            ],
            'buyer' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'The buyer field is required.',
                    'numeric' => 'The buyer field must be numeric.',
                ],
            ],
            'ref' => [
                'rules' => 'permit_empty|alpha_numeric|max_length[50]',
                'errors' => [
                    'alpha_numeric' => 'Reference must only contain letters and numbers.',
                    'max_length' => 'Reference cannot exceed 50 characters.',
                ],
            ],
            'moisture' => [
                'rules' => 'required|decimal',
                'errors' => [
                    'required' => 'The moisture field is required.',
                    'decimal' => 'The moisture field must be a valid decimal number.',
                ],
            ],
            'items' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Items are required.',
                ],
            ],
            'quantities' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Quantities are required.',
                ],
            ],
            'prices' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Prices are required.',
                ],
            ],
            'fxRate' => [
                'rules' => 'required|decimal',
                'errors' => [
                    'required' => 'The exchange rate is required.',
                    'decimal' => 'The exchange rate must be a valid decimal number.',
                ],
            ],
        ];
    }

    /**
     * Updates Sales Report Validation Rules
     *
     * @return void
     */
    public function setUpdateSalesValidationRules(): void
    {
        $this->salesUpdateReportValidationRules = [
            'salesNo' => [
                'rules' => 'required|max_length[20]',
                'errors' => [
                    'required' => 'Sales report number is required.',
                    'max_length' => 'Sales report number cannot exceed 20 characters.',
                ],
            ],
            'ref' => [
                'rules' => 'permit_empty|max_length[50]',
                'errors' => [
                    'max_length' => 'Reference cannot exceed 50 characters.',
                ],
            ],
            'moisture' => [
                'rules' => 'required|decimal',
                'errors' => [
                    'required' => 'The moisture field is required.',
                    'decimal' => 'The moisture field must be a valid decimal number.',
                ],
            ],
            'fxRate' => [
                'rules' => 'required|decimal',
                'errors' => [
                    'required' => 'The exchange rate is required.',
                    'decimal' => 'The exchange rate must be a valid decimal number.',
                ],
            ],
            'market' => [
                'rules' => 'required|string|max_length[255]',
                'errors' => [
                    'required' => 'The market field is required.',
                    'string' => 'The market field must be a valid string.',
                    'max_length' => 'The market field cannot exceed 255 characters.',
                ],
            ],
            'contractNature' => [
                'rules' => 'required|string|max_length[100]',
                'errors' => [
                    'required' => 'The contract nature field is required.',
                    'string' => 'The contract nature must be a valid string.',
                    'max_length' => 'The contract nature cannot exceed 100 characters.',
                ],
            ],
            'items' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Items are required.',
                ],
            ],
            'quantities' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Quantities are required.',
                ],
            ],
            'prices' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Prices are required.',
                ],
            ],
        ];
    }

    /**
     * Set Buyers Validation Rules
     *
     * @return void
     */
    public function setBuyerInfoValidationRules(): void
    {
        $this->buyerInfoValidationRules = [
            'buyerInfo.name' => [
                'rules' => 'required|string|max_length[255]',
                'errors' => [
                    'required' => 'Name is required.',
                    'string' => 'Name must be a valid string.',
                    'max_length' => 'Name cannot exceed 255 characters.',
                ],
            ],
            'buyerInfo.contact_person' => [
                'rules' => 'required|string|max_length[255]',
                'errors' => [
                    'required' => 'Contact person is required.',
                    'string' => 'Contact person must be a valid string.',
                    'max_length' => 'Contact person cannot exceed 255 characters.',
                ],
            ],
            'buyerInfo.telephone_1' => [
                'rules' => 'required|numeric|min_length[10]|max_length[15]',
                'errors' => [
                    'required' => 'Primary telephone is required.',
                    'numeric' => 'Primary telephone must be a valid number.',
                    'min_length' => 'Primary telephone must be at least 10 digits.',
                    'max_length' => 'Primary telephone cannot exceed 15 digits.',
                ],
            ],
            'buyerInfo.telephone_2' => [
                'rules' => 'permit_empty|numeric|min_length[10]|max_length[15]',
                'errors' => [
                    'numeric' => 'Secondary telephone must be a valid number.',
                    'min_length' => 'Secondary telephone must be at least 10 digits.',
                    'max_length' => 'Secondary telephone cannot exceed 15 digits.',
                ],
            ],
            'buyerInfo.email_1' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email is required.',
                    'valid_email' => 'Please provide a valid email address.',
                ],
            ],
            'buyerInfo.category_id' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'Category ID is required.',
                    'integer' => 'Category ID must be a valid integer.',
                ],
            ],
            'buyerInfo.currency_id' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'Currency ID is required.',
                    'integer' => 'Currency ID must be a valid integer.',
                ],
            ],
            'buyerInfo.role' => [
                'rules' => 'required|string|max_length[100]',
                'errors' => [
                    'required' => 'Role is required.',
                    'string' => 'Role must be a valid string.',
                    'max_length' => 'Role cannot exceed 100 characters.',
                ],
            ],
            'buyerInfo.country_id' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'Country ID is required.',
                    'integer' => 'Country ID must be a valid integer.',
                ],
            ],
            'buyerInfo.city' => [
                'rules' => 'permit_empty|string|max_length[100]',
                'errors' => [
                    'string' => 'City must be a valid string.',
                    'max_length' => 'City cannot exceed 100 characters.',
                ],
            ],
            'buyerInfo.street' => [
                'rules' => 'permit_empty|string|max_length[255]',
                'errors' => [
                    'string' => 'Street must be a valid string.',
                    'max_length' => 'Street cannot exceed 255 characters.',
                ],
            ],
        ];
    }

    /**
     * Set Buyers Edit Validation Rules
     *
     * @return void
     */
    public function setBuyerUpdateInfoValidationRules(): void
    {
        $this->buyerUpdateInfoValidationRules = [
            'info.name' => [
                'rules' => 'required|string|max_length[255]',
                'errors' => [
                    'required' => 'Name is required.',
                    'string' => 'Name must be a valid string.',
                    'max_length' => 'Name cannot exceed 255 characters.',
                ],
            ],
            'info.contact_person' => [
                'rules' => 'required|string|max_length[255]',
                'errors' => [
                    'required' => 'Contact person is required.',
                    'string' => 'Contact person must be a valid string.',
                    'max_length' => 'Contact person cannot exceed 255 characters.',
                ],
            ],
            'info.telephone_1' => [
                'rules' => 'required|numeric|min_length[10]|max_length[15]',
                'errors' => [
                    'required' => 'Primary telephone is required.',
                    'numeric' => 'Primary telephone must be a valid number.',
                    'min_length' => 'Primary telephone must be at least 10 digits.',
                    'max_length' => 'Primary telephone cannot exceed 15 digits.',
                ],
            ],
            'info.telephone_2' => [
                'rules' => 'permit_empty|numeric|min_length[10]|max_length[15]',
                'errors' => [
                    'numeric' => 'Secondary telephone must be a valid number.',
                    'min_length' => 'Secondary telephone must be at least 10 digits.',
                    'max_length' => 'Secondary telephone cannot exceed 15 digits.',
                ],
            ],
            'info.email_1' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email is required.',
                    'valid_email' => 'Please provide a valid email address.',
                ],
            ],
            'info.category_id' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'Category ID is required.',
                    'integer' => 'Category ID must be a valid integer.',
                ],
            ],
            'info.role' => [
                'rules' => 'required|string|max_length[100]',
                'errors' => [
                    'required' => 'Role is required.',
                    'string' => 'Role must be a valid string.',
                    'max_length' => 'Role cannot exceed 100 characters.',
                ],
            ],
            'info.country_id' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'Country ID is required.',
                    'integer' => 'Country ID must be a valid integer.',
                ],
            ],
            'info.city' => [
                'rules' => 'permit_empty|string|max_length[100]',
                'errors' => [
                    'string' => 'City must be a valid string.',
                    'max_length' => 'City cannot exceed 100 characters.',
                ],
            ],
            'info.street' => [
                'rules' => 'permit_empty|string|max_length[255]',
                'errors' => [
                    'string' => 'Street must be a valid string.',
                    'max_length' => 'Street cannot exceed 255 characters.',
                ],
            ],
        ];
    }
    /**
     * Set Staff Addition Validation rules
     *
     * @return void
     */
    public function setAddStaffRules(): void
    {
        $this->addStaffRules = [
            'title' => [
                'rules' => 'required|alpha_space|max_length[10]',
                'errors' => [
                    'required' => 'Title is required.',
                    'max_length' => 'Title must be at most 10 characters long.',
                ],
            ],
            'fname' => [
                'rules' => 'required|alpha_space|min_length[2]',
                'errors' => [
                    'required' => 'First name is required.',
                    'alpha_space' => 'First name can only contain alphabetic characters and spaces.',
                    'min_length' => 'First name must be at least 2 characters long.',
                ],
            ],
            'lname' => [
                'rules' => 'required|alpha_space|min_length[2]',
                'errors' => [
                    'required' => 'Last name is required.',
                    'alpha_space' => 'Last name can only contain alphabetic characters and spaces.',
                    'min_length' => 'Last name must be at least 2 characters long.',
                ],
            ],
            'middle_name' => [
                'rules' => 'permit_empty|alpha_space',
                'errors' => [
                    'alpha_space' => 'Middle name can only contain alphabetic characters and spaces.',
                ],
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[users.email]',
                'errors' => [
                    'required' => 'Email address is required.',
                    'valid_email' => 'Please provide a valid email address.',
                    'is_unique' => 'The email address is already in use.',
                ],
            ],
            'phone' => [
                'rules' => 'required|numeric|min_length[10]|max_length[15]',
                'errors' => [
                    'required' => 'Phone number is required.',
                    'numeric' => 'Phone number must contain only digits.',
                    'min_length' => 'Phone number must be at least 10 digits long.',
                    'max_length' => 'Phone number cannot exceed 15 digits.',
                ],
            ],
            'role' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Position is required.',
                    'alpha_space' => 'Position can only contain alphabetic characters and spaces.',
                ],
            ],
            'address' => [
                'rules' => 'permit_empty|string',
                'errors' => [
                    'string' => 'Address must be a valid text.',
                ],
            ],
            'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Password is required.',
                    'min_length' => 'Password must be at least 8 characters long.',
                ],
            ],
        ];
    }
}
