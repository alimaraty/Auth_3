<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة تحكم</title>
    <!-- استيراد Bootstrap من خلال CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
                <a href="#"><i class="bi bi-bar-chart"></i> التقارير</a>
                <a href="#"><i class="bi bi-gear"></i> الإعدادات</a>
                <a href="#"><i class="bi bi-people"></i> المستخدمين</a>

                <!-- زر تسجيل الخروج -->
                <form action="{{ route('student.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-logout">تسجيل الخروج</button>
                </form>
            </nav>

            <!-- المحتوى الرئيسي -->
            <main class="col-md-10 p-4">
                <header>
                    <h1>مرحبًا بك في لوحة التحكم</h1>
                </header>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">عدد المستخدمين</h5>
                                <p class="card-text display-6">123</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">عدد الطلبات</h5>
                                <p class="card-text display-6">456</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">الإيرادات</h5>
                                <p class="card-text display-6">789$</p>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- استيراد Bootstrap JS من خلال CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
</body>

</html>
