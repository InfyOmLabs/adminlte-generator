<?php
/**
 * Company: InfyOm Technologies, Copyright 2019, All Rights Reserved.
 * Author: Vishal Ribdiya
 * Email: vishal.ribdiya@infyom.com
 * Date: 11-07-2019
 * Time: 05:16 PM.
 */

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class ApiOperationFailedException extends Exception
{
    public $data;

    /**
     * ApiOperationFailedException constructor.
     *
     * @param string    $message
     * @param int       $code
     * @param Exception $previous
     * @param $data
     */
    public function __construct($message = '', $code = 0, Exception $previous = null, $data = null)
    {
        if ($code == 0) {
            $code = Response::HTTP_BAD_REQUEST;
        }
        parent::__construct($message, $code, $previous);
        $this->data = $data;
    }
}
