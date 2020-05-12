<?php

namespace Core;

use App\Config;

class Error
{
    private static $statusCode = 500;
    /**
     * @param $level
     * @param $message
     * @param $file
     * @param $line
     * @throws \ErrorException
     */
    public static function errorHandler($level, $message, $file, $line)
    {
        if (error_reporting() !== 0) { //@ operator
            throw new \ErrorException($message, 0, $level, $file, $line);
        }
    }

    public static function exceptionHandler(\Exception $exception)
    {
        if ($exception->getCode()) {
            self::$statusCode = $exception->getCode();
        }

        http_response_code(self::$statusCode);

        if (Config::APP_DEBUG) {
            echo self::errorMessageDetails($exception);
        } else {
            $log = dirname(__DIR__) . '/storage/logs/log-' . date('Y-m-d') . '.log';
            ini_set('error_log', $log);

            error_log(self::errorMessageLog($exception));

            View::renderTemplate('/errors/' . self::$statusCode . '.html', [
                'message' => self::friendlyErrorMessage($exception),
            ]);
        }

    }

    private static function errorMessageDetails(\Exception $exception)
    {
        $message = "<h1>FATAL ERROR</h1>\n";
        $message .= "<p>Uncaught exception: '" . get_class($exception) . "'</p>\n";
        $message .= "<p>Message: '" . $exception->getMessage() . "'</p>\n";
        $message .= "<p>Stack trace: <pre>" . $exception->getTraceAsString() . "</pre></p>\n";
        $message .= "<p>Thrown in '" . $exception->getFile() . "' on line " . $exception->getLine() . "</p>";
        return $message;
    }

    private static function errorMessageLog(\Exception $exception)
    {
        $message = "PHP FATAL ERROR: ";
        $message .= "UNCAUGHT EXCEPTION: " . get_class($exception) . "\n";
        $message .= "Message: " . $exception->getMessage() . "\n";
        $message .= "Stack trace: \n" . $exception->getTraceAsString() . "\n";
        $message .= "Thrown in '" . $exception->getFile() . "' on line " . $exception->getLine();
        return $message;
    }

    public static function friendlyErrorMessage(\Exception $exception)
    {
        return $exception->getMessage();
    }
}