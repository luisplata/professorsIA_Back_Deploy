<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        // Validación de los datos
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|string|unique:users|max:255',
            'password' => 'required|string|min:8',
            'confirmPassword' => 'required', 'string', 'min:8',
        ]);

        // Si la validación falla, retorna los errores
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], 422);
        }

        // Crear el usuario
        $user = User::create([
            'name' => $request->name,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hashear la contraseña
            'confirmPassword' => Hash::make($request->password), // Hashear la confirmacion de la contraseña
        ]);

        // Retornar respuesta exitosa
        return response()->json([
            'status' => 'success',
            'user' => $user,
        ], 201);

        /* return redirect()->route('login')->with('success', 'Usuario registrado exitosamente.'); */
    }
}
