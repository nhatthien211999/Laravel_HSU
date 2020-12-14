<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\gmail;
class MailController extends Controller
{
    public function sendEmail()
    {
        // $email = auth()->user()->email;
        $details = [
            'title' => 'Mail from thien.ldn5368@sinhvien.hoasen.edu.vn',
            'body' => 'Tạo tài khoảng thành công'
        ];

        Mail::to("thien.ldn5368@sinhvien.hoasen.edu.vn")->send(new gmail($details));

        return 'Email';
    }
}
