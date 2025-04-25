<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تعديل المادة</title>
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

        .form-control {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.15);
            border-color: rgba(255, 255, 255, 0.3);
            color: white;
            box-shadow: none;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.5);
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
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2 class="mb-0">تعديل المادة</h2>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('teacher.courses.update', $course) }}">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="name" class="form-label">اسم المادة</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name', $course->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="code" class="form-label">رمز المادة</label>
                                <input type="text" class="form-control @error('code') is-invalid @enderror"
                                    id="code" name="code" value="{{ old('code', $course->code) }}" required>
                                @error('code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="credits" class="form-label">الوحدات</label>
                                <input type="number" class="form-control @error('credits') is-invalid @enderror"
                                    id="credits" name="credits" value="{{ old('credits', $course->credits) }}"
                                    required min="1">
                                @error('credits')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">الوصف</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                    rows="3">{{ old('description', $course->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('teacher.courses.index') }}" class="btn btn-secondary">إلغاء</a>
                                <button type="submit" class="btn btn-primary">حفظ التغييرات</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
