<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تفاصيل المادة</title>
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

        .btn-primary {
            background-color: #4CAF50;
            border: none;
        }

        .btn-primary:hover {
            background-color: #45a049;
        }

        .btn-secondary {
            background-color: #6c757d;
            border: none;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .course-info {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
        }

        .course-info h5 {
            color: #A5D6A7;
            margin-bottom: 10px;
        }

        .course-info p {
            margin-bottom: 0;
            color: rgba(255, 255, 255, 0.9);
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2 class="mb-0">تفاصيل المادة</h2>
                    </div>

                    <div class="card-body">
                        <div class="course-info">
                            <h5>اسم المادة</h5>
                            <p>{{ $course->name }}</p>
                        </div>

                        <div class="course-info">
                            <h5>رمز المادة</h5>
                            <p>{{ $course->code }}</p>
                        </div>

                        <div class="course-info">
                            <h5>الوحدات</h5>
                            <p>{{ $course->credits }}</p>
                        </div>

                        <div class="course-info">
                            <h5>الوصف</h5>
                            <p>{{ $course->description ?: 'لا يوجد وصف' }}</p>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('teacher.courses.index') }}" class="btn btn-secondary">العودة للقائمة</a>
                            <div>
                                <a href="{{ route('teacher.courses.edit', $course) }}"
                                    class="btn btn-primary me-2">تعديل</a>
                                <form action="{{ route('teacher.courses.destroy', $course) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('هل أنت متأكد من حذف هذه المادة؟')">حذف</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
