<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use GuzzleHttp\Client;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validar los datos del formulario de login
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:50',
            /* 'recaptcha_token' => 'required|string', */
        ]);

        // Verificar el reCAPTCHA v3
        /* $recaptchaToken = $request->input('recaptcha_token');
        $recaptchaValid = $this->validateRecaptcha($recaptchaToken);

        if (!$recaptchaValid) {
            return response()->json(['status' => 'error', 'message' => 'reCAPTCHA verification failed.'], 422);
        } */

        // Intentar autenticar al usuario
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            // Generar un token o realizar otra acción (dependerá de tu sistema de autenticación)
            return response()->json([
                'status' => 'success',
                'user' => $user,
            ], 200);
        }

        // Si las credenciales no son correctas
        return response()->json([
            'status' => 'error',
            'message' => 'Invalid credentials.',
        ], 401);
    }

    /* private function validateRecaptcha($recaptchaToken)
    {
        $client = new Client();
        $secretKey = env('GOOGLE_RECAPTCHA_SECRET'); // Añade esta variable a tu archivo .env

        $response = $client->post('https://www.google.com/recaptcha/api/siteverify', [
            'form_params' => [
                'secret' => $secretKey,
                'response' => $recaptchaToken,
            ],
        ]);

        $body = json_decode((string)$response->getBody());

        // Verificamos si el score es mayor a 0.5 (esto indica que no es un bot)
        return $body->success && $body->score >= 0.5;
    } */
}
