<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedirectController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if (auth()->user()->isAn('admin')) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('recipient.dashboard');
        }
    }
}
