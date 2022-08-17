<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserLimit;

class SettingsController extends Controller
{
    public function show()
    {
        $data = UserLimit::where('email', session('email'))->get();
        $type = $data->pluck('type')->first();
        return view('next.settings', [
            'type'  => $type
        ]);
    }

    public function update(Request $request)
    {
        $type = $request->input('type');
        $type = (int) $type;

        $update = UserLimit::where('email', session('email'))->update([
            'type'  => $type
        ]);

        return redirect()->route('settings');
    }
}
