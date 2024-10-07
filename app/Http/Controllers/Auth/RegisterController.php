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
            'name' => 'required|string|max:250',
            'lastName' => 'required|string|max:250',
            'phoneNumber' => 'required|string|max:13',
            'email' => 'required|string|unique:users|max:250',
            'password' => 'required|string|min:8|max:50',
            'confirmPassword' => 'required', 'string', 'min:8|max:50',
        ]);


        // Si la validación falla, retorna los errores
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], 422);
        }
        //HOLA MUNDO
        // Crear el usuario
        $user = User::create([
            'name' => $request->name,
            'lastName' => $request->lastName,
            'phoneNumber' => $request->phoneNumber,
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
