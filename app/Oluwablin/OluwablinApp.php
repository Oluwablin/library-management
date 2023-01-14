<?php

namespace App\Oluwablin;

trait OluwablinApp
{

    /**
     * This handle programming error in the entire app. It send error
     * stack in env while sending your desire or default message in production
     *
     * @param \Exception $e
     * @param string $status
     * @param int $code
     * @param string $message default 'Something went wrong, please try again!'
     * @param  please
     *
     * @return [json]
     */
    protected function AppException(\Exception $e, string $message = 'Something went wrong, please try again!')
    {
        if (config('app.env') === 'production') {
            return response()->json([
                'status' => 'Failed',
                'message' => $message
            ], 500);
        }

        return response()->json([
            'status' => 'Failed',
            'message' => $e->getMessage(),
            'error' => $e->getTrace()
        ], 500);
    }

    /**
     * Implement this method to return app reponses
     * @param string $status
     * @param string $message
     * @param int $code
     * @param array|null $data
     * @param string|null $token
     *
     * @return \Illuminate\Http\Response
     */
    protected function AppResponse(string $status, string $message, int $code = 200, $data = [], string $token = null, int $count = null, string $path = null)
    {
        if (!request()->expectsJson()) {
            return $path ? redirect($path)->with('success', $message) : back()->with('success', $message);
        }

        $returnData = ['status' => $status, 'message' => $message];

        if ($count !== null) $returnData['count'] = $count;
        if (!empty($data)) $returnData['data'] = $data;
        if ($token !== null) $returnData['access_token'] = $token;

        return response()->json($returnData, $code);
    }

    /**
     * Implement this method to send error object
     *
     * @param string $status
     * @param mixed $error
     * @param int $code
     * @param array $data
     *
     * @return \Illuminate\Http\Response
     */
    protected function AppError(string $status, $error, int $code = 500, $data = [])
    {
        if (!request()->expectsJson()) {
            return \back()->withErrors($error)->with($data);
        }
        return response()->json([
            'status' => $status,
            'error'  => $error,
            'data' => $data
        ], $code);
    }
}
