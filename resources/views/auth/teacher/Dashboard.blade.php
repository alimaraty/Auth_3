<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة تحكم المدرس</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #2E7D32, #A5D6A7);
            color: white;
            font-family: 'Tajawal', sans-serif;
            overflow-x: hidden;
        }

        .sidebar {
            height: 100vh;
            background-color: rgba(46, 125, 50, 0.9);
            color: #A5D6A7;
            padding: 15px;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(10px);
        }

        .sidebar h4 {
            font-size: 1.6rem;
            border-bottom: 2px solid #A5D6A7;
            padding-bottom: 10px;
            text-transform: uppercase;
        }

        .sidebar a {
            color: #A5D6A7;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px;
            margin: 5px 0;
            border-radius: 10px;
            transition: background-color 0.3s, transform 0.3s;
        }

        .sidebar a:hover {
            color: white;
            background-color: #A5D6A7;
            transform: scale(1.05);
        }

        .sidebar .btn-logout {
            background-color: #EF5350;
            border: none;
            color: white;
            text-align: center;
            padding: 10px;
            width: 100%;
            border-radius: 10px;
            margin-top: 20px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .sidebar .btn-logout:hover {
            background-color: #D32F2F;
        }

        .card {
            background: linear-gradient(135deg, #A5D6A7, #2E7D32);
            color: white;
            border: none;
            border-radius: 15px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.4);
        }

        .card-title {
            font-weight: bold;
            font-size: 1.4rem;
            text-transform: uppercase;
        }

        header {
            margin-bottom: 30px;
            text-align: center;
            padding: 20px;
            background: linear-gradient(135deg, #A5D6A7, #2E7D32);
            color: white;
            border-radius: 15px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
        }

        header h1 {
            font-size: 2.5rem;
            font-weight: bold;
        }

        .course-card {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
            transition: all 0.3s ease;
        }

        .course-card:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-5px);
        }

        .btn-add-course {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .btn-add-course:hover {
            background-color: #45a049;
            transform: scale(1.05);
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- الشريط الجانبي -->
            <nav class="col-md-2 sidebar">
                <h4 class="text-center">لوحة التحكم</h4>
                <a href="#"><i class="bi bi-house"></i> الرئيسية</a>
                <a href="{{ route('teacher.courses.index') }}"><i class="bi bi-book"></i> المواد الدراسية</a>
                <a href="#"><i class="bi bi-calendar"></i> الجدول الدراسي</a>
                <a href="#"><i class="bi bi-person"></i> الملف الشخصي</a>

                <!-- زر تسجيل الخروج -->
                <form action="{{ route('teacher.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-logout">تسجيل الخروج</button>
                </form>
            </nav>

            <!-- المحتوى الرئيسي -->
            <main class="col-md-10 p-4">
                <header>
                    <h1>مرحبًا بك في لوحة تحكم المدرس</h1>
                </header>

                <!-- قسم المواد الدراسية -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h3 class="card-title">المواد الدراسية</h3>
                                    <a href="{{ route('teacher.courses.create') }}" class="btn btn-add-course">
                                        <i class="bi bi-plus-circle"></i> إضافة مادة جديدة
                                    </a>
                                </div>

                                <!-- قائمة المواد -->
                                <div class="row">
                                    @foreach (\App\Models\Course::all() as $course)
                                        <div class="col-md-4">
                                            <div class="course-card">
                                                <h5>{{ $course->name }}</h5>
                                                <p class="text-muted">الكود: {{ $course->code }}</p>
                                                <p class="text-muted">الوحدات: {{ $course->credits }}</p>
                                                <p>{{ Str::limit($course->description, 100) }}</p>
                                                <div class="d-flex gap-2 mt-3">
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
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- استيراد Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
