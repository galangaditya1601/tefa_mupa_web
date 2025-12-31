<?php

namespace App\Http\Controllers\Backoffice\Auth;

use App\Commons\Controller\BaseController;
use Illuminate\Http\Request;
use App\Repositories\LoginRepository;
use App\Schemas\auth\LoginSchema;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class AutenticationController extends BaseController
{
    public function __construct(
        private LoginRepository $loginRepository
    ) {}

    public function login(Request $request)
    {
        try {
            $schema = new LoginSchema();
            $schema->hydrateSchemaBody($request->all());
            $user = $this->loginRepository->login($schema);
            Auth::login($user);
            return redirect()->route('dashboard');

        } catch (ValidationException $e) {
            return redirect()->route('login-backoffice')->withErrors($e->errors());
        }
    }
}
