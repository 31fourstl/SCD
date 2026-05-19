<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

/**
 * Base controller for all admin panel controllers.
 * Checks that the user is authenticated before allowing access.
 */
abstract class AdminBaseController extends BaseController
{
    public function initController(
        \CodeIgniter\HTTP\RequestInterface $request,
        \CodeIgniter\HTTP\ResponseInterface $response,
        \Psr\Log\LoggerInterface $logger
    ) {
        parent::initController($request, $response, $logger);
    }
}
