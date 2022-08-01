<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class UnprocessableEntityException extends Exception
{
    /**
     * Report the exception.
     *
     * @return bool|null
     */
    public function report()
    {
        //
    }

    /**
     * Render the exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
        return response()->json([
            'status' => Response::HTTP_UNPROCESSABLE_ENTITY,
            'error' => $this->getMessage()
        ], Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
