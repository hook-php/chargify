<?php

use CaptainHook\CaptainHook;
use CaptainHook\Chargify\Chargify;
use CaptainHook\Chargify\Webhook;
use Psr\Http\Message\RequestInterface as Request;

(new CaptainHook)
    ->with(new Chargify, [
        new Middleware,
        new Middleware,
        new Middleware,
    ])
        ->on(Chargify::SIGNUP_SUCCESS, function(Webhook $webhook, Request $request) {}, [
            new Middleware,
            new Middleware,
            new Middleware,
        ])
    ->end()
;
