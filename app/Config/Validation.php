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
     * @var string[]
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

    public $gameRules = array(
        'name' => array(
          'label' => 'name',
          'rules'  => 'trim|required|is_unique[game.name]',
          'errors' => array(
            'required' => 'Veuillez entrer un nom de jeu.',
            'is_unique' => 'Ce jeu a déjà été enregistré.'
          ),
        )
      );

      public $joinRules = array(
        'username' => array(
          'label' => 'username',
          'rules'  => 'trim|required|min_length[4]|max_length[20]|alpha_numeric|is_unique[user.username]',
          'errors' => array(
            'required' => 'Please choose a username.',
            'min_length' => 'Username must be a minimum of 4 characters.',
            'max_length' => 'Username must be a maximum of 20 characters.',
            'alpha_numeric' => 'Username only contains letters and numbers.',
            'is_unique' => 'This username already exists.'
          ),
        ),
        'email' => array(
          'label' => 'email',
          'rules'  => 'trim|required|valid_email|is_unique[user.email]',
          'errors' => array(
            'required' => 'Please enter an email.',
            'valid_email' => 'Please enter a valid email.',
            'is_unique' => 'This email already exists.'
          ),
        ),
        'password' => array(
          'label' => 'password',
          'rules'  => 'trim|required|min_length[8]|regex_match[/(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[#?!@$%^&*-])/]',
          'errors' => array(
            'required' => 'Please enter a password.',
            'min_length' => 'Password must be a minimum of 8 characters.',
            'regex_match' => 'Password must contain at least 1 uppercase letter, 1 lowercase letter, 1 number and 1 special characters (#?!@$%^&*-).'
          ),
        ),
        'check' => array(
          'label' => 'check',
          'rules'  => 'required',
          'errors' => array(
            'required' => 'You must agree before submitting.'
          ),
        )
      );

      public $loginRules = array(
        'email' => array(
          'label' => 'email',
          'rules'  => 'trim|required|valid_email',
          'errors' => array(
            'required' => 'Invalid email.',
            'valid_email' => 'Invalid email.'
          ),
        ),
        'password' => array(
          'label' => 'password',
          'rules' => 'required',
          'errors' => array(
            'required' => 'Invalid password.'
          )
        )
      );

}
