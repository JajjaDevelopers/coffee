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

    public function __construct()
    {
        $this->setCoffeeGradesRules();
    }

    //setting user Rules
    // public function setUsernameRules(): void
    // {
    //     $this->userNameRules = [
    //         "name" => [
    //             "rules" => "is_unique[users.name]",
    //             "errors" => [
    //                 "is_unique" => "User name already exists"
    //             ]
    //         ]
    //     ];
    // }
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
}
