<?php
/**
 * Sendgrid Plugin Configuration.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Madalin Ignisca (https://github.com/madalinignisca)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Madalin Ignisca (https://github.com/madalinignisca)
 * @link          https://github.com/madalinignisca/sendgrid CakePHP(tm) Project
 * @since         dev
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

return [
    'EmailTransport' => [
        'sendgrid' => [
            'className' => '\MadalinIgnisca\Sendgrid\Mailer\Transport\SendgridTransport',
            'username' => env('SENDGRID_USERNAME', env('SENGRID_API', null)),
            'password' => env('SENDGRID_PASSWORD', null),
        ]
    ],
];

