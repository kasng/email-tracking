<?php

namespace App\Http\Controllers;

use App\Models\SesEmailOpen;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class OpenMailController extends Controller
{
    public function test(Request $request)
    {
        print_r("<pre>");
        var_dump(config('app.url'));

    }

    public function open(Request $request, $beaconIdentifier)
    {
        try {
            $open = SesEmailOpen::whereBeaconIdentifier($beaconIdentifier)->firstOrFail();
        } catch (ModelNotFoundException $e) {
            return response()->json(['success' => false, 'errors' => ['Invalid Beacon']], 422);
        }

        $open->opened_at = Carbon::now();
        $open->save();

        return redirect(config('app.url')."/to.png");
    }
}
