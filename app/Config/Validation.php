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
    public $valuationRules=[];
    public function __construct()
    {
        $this->setCoffeeGradesRules();
        $this->setValuationRules();
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
                'rules' => 'required|is_natural_no_zero',
                'errors' => [
                    'required' => 'Each quantity is required.',
                    'is_natural_no_zero' => 'Quantity must be a positive number.',
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
}
