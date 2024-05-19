<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $band->name }} Details</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="font-sans bg-gray-100">

    <div class="container mx-auto p-4">

        <nav class="bg-gray-800 p-4">
            <div class="container mx-auto flex justify-between items-center">
                <a href="{{ route('bands.index') }}" class="text-white text-lg font-semibold">Bands</a>
                <div class="space-x-4">
                    <a href="{{ route('bands.create') }}" class="text-white">Add Band</a>
                </div>
            </div>
        </nav>

        <div class="mt-8">
            <h1 class="text-3xl font-semibold mb-4">{{ $band->name }} Details</h1>

            <p class="mb-2"><strong class="font-semibold">Genre:</strong> {{ $band->genre }}</p>
            <p class="mb-2"><strong class="font-semibold">Founded:</strong> {{ $band->founded }}</p>
            <p class="mb-4"><strong class="font-semibold">Active Till:</strong> {{ $band->active_till }}</p>

            <h2 class="text-2xl font-semibold mb-2">Albums:</h2>
<ul>
    @foreach ($band->albums as $album)
        <li>{{ $album->name }} ({{ $album->year }})</li>
    @endforeach
</ul>

            <a href="{{ route('bands.index') }}" class="text-blue-500 mt-4">Back to Bands List</a>
        </div>

    </div>

</body>

</html>
