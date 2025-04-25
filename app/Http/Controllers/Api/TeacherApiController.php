<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TeacherApiController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'Hello from Teacher API',
        ]);
    }

    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|string',
                'password' => 'required|min:6',
            ]);

            $teacher = Teacher::where('email', $request->email)->first();

            if (!$teacher || !Hash::check($request->password, $teacher->password)) {
                return response()->json(['message' => 'بيانات الدخول غير صحيحة'], 401);
            }

            $token = $teacher->createToken('teacher_token')->accessToken;

            return response()->json([
                'message' => 'تم تسجيل الدخول بنجاح',
                'access_token' => $token,
                'teacher' => $teacher,
            ]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'حدث خطأ غير متوقع', 'error' => $e->getMessage()], 500);
        }
    }
    public function getTeacher(){
        $teacher = Auth::guard('api')->user();
        if ($teacher) {
            return response()->json([
                'message' => 'تم استرجاع بيانات المعلم بنجاح',
                'teacher' => $teacher,
            ]);
        } else {
            return response()->json(['message' => 'لم يتم العثور على المعلم'], 404);
        }
    }

    }
