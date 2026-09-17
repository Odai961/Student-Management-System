<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Student</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f5f7fa;
        }

        .container {
            width: 90%;
            max-width: 850px;
            margin: 45px auto;
        }

        .header {
            margin-bottom: 25px;
        }

        .header h1 {
            color: #1e3a8a;
            margin-bottom: 6px;
        }

        .header p {
            color: #666;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, .08);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            color: #374151;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 15px;
            outline: none;
        }

        input:focus {
            border-color: #2563eb;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .actions {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 30px;
        }

        .btn {
            padding: 12px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
        }

        .btn-secondary {
            background: #e5e7eb;
            color: #374151;
        }

        .btn:hover {
            opacity: .9;
        }

        .error {
            margin-top: 6px;
            color: #dc2626;
            font-size: 14px;
            font-weight: 500;
        }

        .input-error:focus {
            border-color: #dc2626 !important;
            box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.15);
        }

        @media (max-width: 600px) {
            .form-row {
                grid-template-columns: 1fr;
            }

            .card {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <h1>Add New Student</h1>
        <p>Register a new student in the management system.</p>
    </div>

    <div class="card">

        <form method="POST" action="/students">

            <div class="form-row">

                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input
                        type="text"
                        id="first_name"
                        name="first_name"
                        value="<?= $_POST['first_name']??''?>"
                        placeholder="Enter first name"
                    >
                    <?php if (isset($errors['first_name'])): ?>
                        <p class="error">
                            <?= htmlspecialchars($errors['first_name']) ?>
                        </p>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input
                        type="text"
                        id="last_name"
                        name="last_name"
                        value="<?= $_POST['last_name']??''?>"
                        placeholder="Enter last name"
                    >

                    <?php if (isset($errors['last_name'])): ?>
                        <p class="error">
                            <?= htmlspecialchars($errors['last_name']) ?>
                        </p>
                    <?php endif; ?>
                </div>

            </div>

            <div class="form-row">

                <div class="form-group">
                    <label for="birth_date">Birth Date</label>
                    <input
                        type="date"
                        id="birth_date"
                        value="<?= $_POST['birth_date']??''?>"
                        name="birth_date"
                    >

                    <?php if (isset($errors['birth_date'])): ?>
                        <p class="error">
                            <?= htmlspecialchars($errors['birth_date']) ?>
                        </p>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="<?= $_POST['email']??''?>"
                        placeholder="student@example.com"
                    >

                    <?php if (isset($errors['email'])): ?>
                        <p class="error">
                            <?= htmlspecialchars($errors['email']) ?>
                        </p>
                    <?php endif; ?>
                </div>

            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Enter password"
                >

                <?php if (isset($errors['password'])): ?>
                    <p class="error">
                        <?= htmlspecialchars($errors['password']) ?>
                    </p>
                <?php endif; ?>
            </div>

            <div class="actions">

                <a href="/students" class="btn btn-secondary">
                    Cancel
                </a>

                <button type="submit" class="btn btn-primary">
                    Create Student
                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>