<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Admin</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap"
          rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">

<div class="w-full max-w-md px-4">

    <div class="bg-white rounded-xl shadow-md p-8">

        <div class="mb-6 text-center">
            <h1 class="text-2xl font-semibold text-gray-800">
                Register Admin
            </h1>

            <p class="text-sm text-gray-500 mt-2">
                Create an administrator account.
            </p>
        </div>

        <form method="POST" action="/register" class="space-y-5">

            <!-- Email -->
            <div>
                <label for="email"
                       class="block text-sm font-medium text-gray-700 mb-1">
                    Email
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
                    placeholder="admin@example.com"
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg
                           focus:outline-none focus:ring-2 focus:ring-blue-500"
                >

                <?php if (isset($errors['email'])) : ?>
                    <p class="text-sm text-red-500 mt-1">
                        <?= htmlspecialchars($errors['email']) ?>
                    </p>
                <?php endif; ?>
            </div>

            <!-- Password -->
            <div>
                <label for="password"
                       class="block text-sm font-medium text-gray-700 mb-1">
                    Password
                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Enter password"
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg
                           focus:outline-none focus:ring-2 focus:ring-blue-500"
                >

                <?php if (isset($errors['password'])) : ?>
                    <p class="text-sm text-red-500 mt-1">
                        <?= htmlspecialchars($errors['password']) ?>
                    </p>
                <?php endif; ?>
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="confirm_password"
                       class="block text-sm font-medium text-gray-700 mb-1">
                    Confirm Password
                </label>

                <input
                    type="password"
                    id="confirm_password"
                    name="confirm_password"
                    placeholder="Confirm your password"
                    class="w-full px-4 py-2.5 border border-gray-300 rounded-lg
                           focus:outline-none focus:ring-2 focus:ring-blue-500"
                >

                <?php if (isset($errors['confirm_password'])) : ?>
                    <p class="text-sm text-red-500 mt-1">
                        <?= htmlspecialchars($errors['confirm_password']) ?>
                    </p>
                <?php endif; ?>
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-between pt-2">

                <a href="/"
                   class="text-sm text-gray-600 hover:text-gray-800">
                    Cancel
                </a>

                <button
                    type="submit"
                    class="px-5 py-2.5 bg-blue-600 text-white rounded-lg
                           hover:bg-blue-700 transition">
                    Register
                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>
