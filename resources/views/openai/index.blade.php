<!-- resources/views/openai/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OpenAI Prompt</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-10">
        <div class="bg-white p-6 rounded shadow-md">
            <h1 class="text-2xl font-bold mb-4">Enviar un Prompt a OpenAI</h1>
            
            <form action="{{ route('openai.submit') }}" method="POST" class="mb-4">
                @csrf
                <div class="mb-4">
                    <label for="prompt" class="block text-gray-700 font-bold mb-2">Prompt:</label>
                    <input type="text" id="prompt" name="prompt" 
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                           value="{{ old('prompt') }}" required>
                </div>
                <button type="submit" 
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Enviar
                </button>
            </form>

            @if (isset($response))
                <div class="bg-gray-100 p-4 rounded">
                    <h2 class="text-lg font-bold mb-2">Respuesta:</h2>
                    <p class="text-gray-700">{{ $response }}</p>
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-red-100 p-4 rounded mt-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-red-700">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</body>
</html>
