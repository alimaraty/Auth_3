<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>المواد الدراسية</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #2E7D32, #A5D6A7);
            color: white;
            font-family: 'Tajawal', sans-serif;
            min-height: 100vh;
            padding: 20px;
        }

        .card {
            background: rgba(255, 255, 255, 0.1);
            border: none;
            border-radius: 15px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
        }

        .card-header {
            background: rgba(255, 255, 255, 0.1);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 15px 15px 0 0 !important;
        }

        .table {
            color: white;
        }

        .table thead th {
            border-bottom: 2px solid rgba(255, 255, 255, 0.2);
        }

        .table td,
        .table th {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .btn-primary {
            background-color: #4CAF50;
            border: none;
        }

        .btn-primary:hover {
            background-color: #45a049;
        }

        .btn-info {
            background-color: #2196F3;
            border: none;
        }

        .btn-info:hover {
            background-color: #1e88e5;
        }

        .btn-warning {
            background-color: #FFC107;
            border: none;
        }

        .btn-warning:hover {
            background-color: #ffb300;
        }

        .btn-danger {
            background-color: #F44336;
            border: none;
        }

        .btn-danger:hover {
            background-color: #e53935;
        }

        .alert-success {
            background-color: rgba(76, 175, 80, 0.2);
            border: 1px solid rgba(76, 175, 80, 0.3);
            color: #4CAF50;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2 class="mb-0">المواد الدراسية</h2>
                        <a href="{{ route('teacher.courses.create') }}" class="btn btn-primary">إضافة مادة جديدة</a>
                    </div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>الرمز</th>
                                        <th>الاسم</th>
                                        <th>الوحدات</th>
                                        <th>الوصف</th>
                                        <th>الإجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($courses as $course)
                                        <tr>
                                            <td>{{ $course->code }}</td>
                                            <td>{{ $course->name }}</td>
                                            <td>{{ $course->credits }}</td>
                                            <td>{{ Str::limit($course->description, 50) }}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('teacher.courses.show', $course) }}"
                                                        class="btn btn-info btn-sm">عرض</a>
                                                    <a href="{{ route('teacher.courses.edit', $course) }}"
                                                        class="btn btn-warning btn-sm">تعديل</a>
                                                    <form action="{{ route('teacher.courses.destroy', $course) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('هل أنت متأكد من حذف هذه المادة؟')">حذف</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
