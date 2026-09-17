<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student Details</title>

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

        .student-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .info-group {
            padding: 16px;
            background: #f8fafc;
            border-radius: 8px;
            border: 1px solid #e5e7eb;
        }

        .info-group.full-width {
            grid-column: 1 / -1;
        }

        .info-label {
            display: block;
            margin-bottom: 6px;
            color: #6b7280;
            font-size: 13px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .info-value {
            color: #1f2937;
            font-size: 16px;
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

        @media (max-width: 600px) {
            .student-info {
                grid-template-columns: 1fr;
            }

            .info-group.full-width {
                grid-column: auto;
            }

            .card {
                padding: 20px;
            }

            .actions {
                flex-direction: column;
            }

            .btn {
                text-align: center;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <h1>Student Details</h1>
        <p>View information about this student.</p>
    </div>

    <div class="card">

        <div class="student-info">

            <div class="info-group">
                <span class="info-label">First Name</span>
                <span class="info-value">
                    <?= htmlspecialchars($student['first_name']) ?>
                </span>
            </div>

            <div class="info-group">
                <span class="info-label">Last Name</span>
                <span class="info-value">
                    <?= htmlspecialchars($student['last_name']) ?>
                </span>
            </div>

            <div class="info-group">
                <span class="info-label">Email</span>
                <span class="info-value">
                    <?= htmlspecialchars($student['email']) ?>
                </span>
            </div>

            <div class="info-group">
                <span class="info-label">Birth Date</span>
                <span class="info-value">
                    <?= htmlspecialchars($student['birth_date']) ?>
                </span>
            </div>

            <div class="info-group full-width">
                <span class="info-label">Registered At</span>
                <span class="info-value">
                    <?= htmlspecialchars($student['created_at']) ?>
                </span>
            </div>

        </div>

        <div class="actions">

            <a href="/students" class="btn btn-secondary">
                Back to Students
            </a>

            <a href="/students/edit?id=<?= (int) $student['id'] ?>" class="btn btn-primary">
                Edit Student
            </a>

        </div>

    </div>

</div>

</body>
</html>