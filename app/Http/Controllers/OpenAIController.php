<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Exception;

class OpenAIController extends Controller
{
    public function index()
    {
        return view('openai.index');
    }

    public function generateText(Request $request)
    {
        // Validar la solicitud entrante
        $request->validate([
            'prompt' => 'required|string|max:100',
        ]);

        // Crear una instancia de GuzzleHttp para hacer la solicitud a OpenAI
        try {
            $client = new Client();
            $response = $client->post('https://api.openai.com/v1/chat/completions', [
                'headers' => [
                    'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
                    'Content-Type'  => 'application/json',
                ],
                'json' => [
                    'model' => 'gpt-4', // Usa el modelo GPT-4
                    'messages' => [
                        [
                            'role' => 'user',
                            'content' => $request->input('prompt')
                        ],
                    ],
                    'max_tokens' => 50, // Puedes ajustar el límite de tokens si es necesario
                    'temperature' => 0.7, // Controla la creatividad de la respuesta
                ],
                'verify' => false, // Deshabilita la verificación SSL
            ]);

            // Decodificar la respuesta de OpenAI
            $responseBody = json_decode($response->getBody()->getContents(), true);

            // Retornar la respuesta en formato JSON
            return response()->json([
                'success' => true,
                'data' => $responseBody['choices'][0]['message']['content'] // Tomar la respuesta generada por el modelo
            ]);

        } catch (Exception $e) {
            // Manejo de errores
            return response()->json([
                'success' => false,
                'message' => 'Error al generar la respuesta',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
