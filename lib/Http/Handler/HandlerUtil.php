<?php
namespace bunq\Http\Handler;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 */
class HandlerUtil
{
    /**
     * Middleware that applies a map function to the request before passing to
     * the next handler.
     *
     * @param BaseRequestHandler $requestHandler
     * @return callable
     */
    public static function applyRequestHandler(BaseRequestHandler $requestHandler)
    {
        return function (callable $handler) use ($requestHandler) {
            return function ($request, array $options) use ($handler, $requestHandler) {
                return $handler($requestHandler->execute($request), $options);
            };
        };
    }

    /**
     * Middleware that applies a map function to the resolved promise's
     * response.
     *
     * @param BaseResponseHandler $responseHandler
     * @return callable
     */
    public static function applyResponseHandler(BaseResponseHandler $responseHandler)
    {
        return function (callable $handler) use ($responseHandler) {
            return function (RequestInterface $request, array $options) use ($handler, $responseHandler) {
                return $handler($request, $options)->then(
                    function (ResponseInterface $response) use ($responseHandler) {
                        return $responseHandler->execute($response);
                    }
                );
            };
        };
    }
}
