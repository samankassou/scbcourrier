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
        } else if (auth()->user()->isAn('writer')) {
            return redirect()->route('writer.dashboard');
        } else if (auth()->user()->isAn('manager')) {
            return redirect()->route('manager.dashboard');
        } else {
            return redirect()->route('recipient.dashboard');
        }
    }
}
