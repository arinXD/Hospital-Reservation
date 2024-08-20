<?php

namespace App\Http\Middleware;

use App\Models\Patient;
use App\Models\Treatment_record;
use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use function PHPUnit\Framework\isEmpty;

class patientMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next){
        $user = User::find(auth()->user()->id);
        $patient = $user->patients;
        // $patient = Patient::where('user_id','=',Auth::user()->id)->get();
        // $treatmentRec = Treatment_record::where('patient_id','=',$patient->id)->get();
        // $ftm = Treatment_record::where('patient_id','=',$user->patients->id)->get();
        
        if ($user->patients->count()) {
            return $next($request);
            // echo "มี";
        }else{
            return response()->view('alert');

        }
    }
}
