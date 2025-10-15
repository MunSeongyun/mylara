<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;

class TestRequestController extends Controller
{
    public function create()
    {
        return view('request_test');
    }

    public function store(StoreUserRequest $request)
    {
        $name = $request->input('name');
        $email = $request->input('email', 'default@example.com');
        $allData = $request->all();
        $onlyNameAndEmail = $request->only(['name', 'email']);
        $exceptPassword = $request->except('password');

        if ($request->has('name')) {
        }

        if ($request->hasFile('profile_image') && $request->file('profile_image')->isValid()) {
            $file = $request->file('profile_image');
            $path = $file->store('uploads/profiles');
            $originalName = $file->getClientOriginalName();
        } else {
            $path = '파일 없음';
        }

        $requestPath = $request->path();
        $requestUrl = $request->url();
        $requestMethod = $request->method();
        $userAgent = $request->header('User-Agent');

        dd([
            'name' => $name,
            'email' => $email,
            'allData' => $allData,
            'onlyNameAndEmail' => $onlyNameAndEmail,
            'exceptPassword' => $exceptPassword,
            'filePath' => $path,
            'requestPath' => $requestPath,
            'requestUrl' => $requestUrl,
            'requestMethod' => $requestMethod,
            'userAgent' => $userAgent,
        ]);
    }
}