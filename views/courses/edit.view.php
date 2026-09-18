<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Update Course</title>

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

        .delete-form {
            display: flex;
            justify-content: flex-end;
            margin-top: 12px;
        }

        .delete-btn {
            padding: 12px 20px;
            color: #dc2626;
            background-color: #e5e7eb;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .delete-btn:hover {
            background-color: #fee2e2;
        }


        .textarea-input {
            width: 100%;
            min-height: 120px;
            padding: 12px 14px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            background-color: #fff;
            font-family: inherit;
            font-size: 14px;
            line-height: 1.5;
            resize: vertical;
            box-sizing: border-box;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .textarea-input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .textarea-input::placeholder {
            color: #9ca3af;
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
        <h1>Edit Course</h1>
        <p>modify course information.</p>
    </div>

    <div class="card">

        <form method="POST" action="/courses">

            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="id" value="<?= (int)$course['id'] ?>">

            <div class="form-row">

                <div class="form-group">
                    <label for="title">Title</label>

                    <input
                            type="text"
                            id="title"
                            name="title"
                            value="<?= htmlspecialchars($course['title'] ?? '') ?>"
                            placeholder="Enter course title"
                    >

                    <?php if (isset($errors['title'])): ?>
                        <p class="error">
                            <?= htmlspecialchars($errors['title']) ?>
                        </p>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="price">Price</label>

                    <input
                            type="text"
                            id="price"
                            name="price"
                            value="<?= htmlspecialchars($course['price'] ?? '') ?>"
                            placeholder="Enter course price"
                    >

                    <?php if (isset($errors['price'])): ?>
                        <p class="error">
                            <?= htmlspecialchars($errors['price']) ?>
                        </p>
                    <?php endif; ?>
                </div>

            </div>

            <div class="form-row">

                <div class="form-group">
                    <label for="chapters">chapters</label>

                    <input
                            type="number"
                            id="chapters"
                            name="chapters"
                            value="<?= htmlspecialchars($course['chapters'] ?? '') ?>"
                    >

                    <?php if (isset($errors['chapters'])): ?>
                        <p class="error">
                            <?= htmlspecialchars($errors['chapters']) ?>
                        </p>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="start_date">Start Date</label>

                    <input
                            type="date"
                            id="start_date"
                            name="start_date"
                            value="<?= htmlspecialchars($course['start_date'] ?? '') ?>"
                    >

                    <?php if (isset($errors['start_date'])): ?>
                        <p class="error">
                            <?= htmlspecialchars($errors['start_date']) ?>
                        </p>
                    <?php endif; ?>
                </div>

            </div>

            <div class="form-group">
                <label for="description">Description</label>

                <textarea
                        id="description"
                        name="description"
                        class="textarea-input"
                        placeholder="Enter course description"
                ><?= htmlspecialchars($course['description'] ?? '') ?></textarea>

                <?php if (isset($errors['description'])): ?>
                    <p class="error">
                        <?= htmlspecialchars($errors['description']) ?>
                    </p>
                <?php endif; ?>
            </div>

            <div class="actions">

                <a href="/courses" class="btn btn-secondary">
                    Cancel
                </a>

                <button type="submit" class="btn btn-primary">
                    Update Course
                </button>

            </div>

        </form>

        <form class="delete-form" method="POST" action="/courses">

            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="id" value="<?= (int)$course['id'] ?>">

            <button type="submit" class="delete-btn">
                Delete
            </button>

        </form>

    </div>

</div>

</body>
</html>