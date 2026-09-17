<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Management</title>

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
            max-width: 1200px;
            margin: 40px auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .title h1 {
            color: #1e3a8a;
            margin-bottom: 5px;
        }

        .title p {
            color: #666;
        }

        .btn {
            text-decoration: none;
            background: #2563eb;
            color: white;
            padding: 12px 18px;
            border-radius: 8px;
            font-weight: bold;
        }

        .btn:hover {
            opacity: .9;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, .08);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #1e3a8a;
            color: white;
            text-align: left;
            padding: 14px;
        }

        td {
            padding: 14px;
            border-bottom: 1px solid #eee;
        }

        tr:hover {
            background: #f9fafb;
        }

        .actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .actions a,
        .actions form {
            margin: 0;
        }

        .actions a,
        .actions button {
            font-size: 14px;
            font-weight: bold;
        }

        .actions a {
            text-decoration: none;
        }

        .actions button {
            background: none;
            border: none;
            padding: 0;
            cursor: pointer;
            font-family: inherit;
        }

        .edit {
            color: #2563eb;
        }

        .delete {
            color: #dc2626;
        }

        .actions a:hover,
        .actions button:hover {
            text-decoration: underline;
        }

        .empty {
            text-align: center;
            padding: 30px;
            color: #777;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">

        <div class="title">
            <h1>Student Management System</h1>
            <p>Manage students and enrollments</p>
        </div>

        <a href="/students/create" class="btn">
            + Add Student
        </a>

    </div>

    <div class="card">

        <table>

            <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
            </thead>

            <tbody>

            <?php if (empty($students)): ?>

                <tr>
                    <td colspan="5" class="empty">
                        No students found.
                    </td>
                </tr>

            <?php endif; ?>

            <?php foreach ($students as $student): ?>

                <tr>

                    <td>
                        <?= htmlspecialchars($student['id']) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($student['first_name']) ?>
                        <?= htmlspecialchars($student['last_name']) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($student['email']) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($student['created_at']) ?>
                    </td>

                    <td class="actions">

                        <a class="edit" href="/students/show?id=<?= $student['id'] ?>">
                            View
                        </a>

                        <a class="edit" href="/students/edit?id=<?= $student['id'] ?>">
                            Edit
                        </a>

                        <form method="POST" action="/students">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="id" value="<?= $student['id'] ?>">

                            <button type="submit" class="delete">
                                Delete
                            </button>
                        </form>

                    </td>

                </tr>

            <?php endforeach; ?>

            </tbody>

        </table>

    </div>

</div>

</body>
</html>