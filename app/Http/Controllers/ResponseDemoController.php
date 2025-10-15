<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class ResponseDemoController extends Controller
{
    public function string()
    {
        return response('Hello, World!', Response::HTTP_OK, [
            'Content-Type' => 'text/plain',
        ]);
    }

    public function view()
    {
        return view('welcome', ['message' => 'ResponseDemoController가 보낸 메시지']);
    }

    public function json()
    {
        $data = [
            'id'    => 1,
            'name'  => '문성윤',
            'email' => 'helloworld@example.com',
        ];

        return response()->json($data);
    }

    public function redirect()
    {
        return redirect()->route('redirect-target')
            ->with('status', '리디렉션 성공');
    }

    public function redirectTarget(Request $request)
    {
        $status = session('status');

        return "리디렉션 도착! 메시지: " . ($status ?? '메시지 없음');
    }

    public function download()
    {
        $filePath = storage_path('app/test.txt');
        $fileName = 'user-guide.txt';

        if (!file_exists($filePath)) {
            abort(404);
        }

        return response()->download($filePath, $fileName);
    }
}


