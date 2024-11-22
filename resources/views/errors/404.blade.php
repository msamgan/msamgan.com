<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>404 Error</title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body>
        <section class="flex flex-col items-center justify-between">
            <div class="mt-16 flex flex-col items-center justify-center">
                <h1 class="text-9xl font-bold text-gray-800">404</h1>
                <h2 class="text-2xl font-semibold text-gray-800">Page Not Found</h2>
                <p class="mt-4 w-2/3 text-gray-600">
                    The page you are looking for might have been removed, had its name changed or is temporarily
                    unavailable.
                </p>
                <a href="/" class="mt-4 rounded-md bg-blue-500 px-4 py-2 text-white">Go back to Home</a>
            </div>
            <img
                src="https://cdn.dribbble.com/users/285475/screenshots/2083086/dribbble_1.gif"
                alt="404"
                class="w-1/2"
            />
        </section>
    </body>
</html>
