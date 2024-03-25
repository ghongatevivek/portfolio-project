<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait APIResponseTrait
{
  /**
   * Building success response
   * @param $data
   * @param int $code
   * @return JsonResponse
   */
  public function successResponse($response = [], $message = '')
  {
    if ($response) {
      return response()->json([
        'status' => 'true',
        'message' => $message ?? '',
        'data' => $response
        ], Response::HTTP_OK);
    }

    return response()->json(['data' => [
      'success' => true
    ]], Response::HTTP_OK);
  }

  /**
   * Building success response
   * @param $data
   * @param int $code
   * @return JsonResponse
   */
  public function errorResponse($message, $statusCode = Response::HTTP_NOT_FOUND)
  {
    return response()->json([
        'success' => false,
        'message' => $message
    ], $statusCode);
  }
}