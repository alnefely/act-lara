<?php

namespace App\Http\Controllers\governor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Governor;
use App\Models\UserReg;
use App\Models\Evidence;
use App\Models\Degree;

class AuthGovernorController extends Controller
{

    public function StoreDegree(Request $request)
    {
        if( $request->ajax() ):
            $governor = auth('governor')->user();

            $check = Degree::where([
                'governor_id' => $governor->id,
                'reg_id' => $request->reg_id,
                'evidence_id' => $request->evidence,
                'indicator_id' => $request->indicator,
            ])->count();

            if( $check >= 1 ):
                return response()->json([
                    'status' => 'error',
                ]);
            endif;
            $row = new Degree;
            $row->governor_id = $governor->id;
            $row->reg_id = $request->reg_id;
            $row->degree = $request->degree;
            $row->evidence_id = $request->evidence;
            $row->indicator_id = $request->indicator;
            $row->save();
            return response()->json([
                'status' => 'done'
            ]);
        endif;
    }

    public function EvidencesAjax(Request $request)
    {
        if( $request->ajax() ):
            $Evidences = Evidence::where('standard_id', $request->standard_id)->with('indicator:id,name')->get();
            $governor = auth('governor')->user();

            $row = '';
            foreach ($Evidences as $key => $val):
                $check = Degree::where([
                    'governor_id' => $governor->id,
                    'reg_id' => $request->reg_id,
                    'evidence_id' => $val->id,
                    'indicator_id' => $val->indicator->id,
                ]);
                if( $check->count() > 0 ):
                    $check = $check->first();
                    $deg = "<td style='font-size: 15px'>$check->degree</td>";
                else:
                    $deg = "
                    <td style='font-size: 15px'>
                        <input type='number' class='deg-$key'  />
                        <span class='btn btn-sm btn-danger save-deg'
                        data-reg_id='$request->reg_id'
                        data-evidence=".$val->id."
                        data-indicator='".$val->indicator->id."'
                        data-class='deg-$key'>حفظ</span>
                    </td>
                    ";
                endif;
                $row .= "<tr>
                        <td style='font-size: 15px'>".($key+1)."</td>
                        <td style='font-size: 15px'>".$val->indicator->name."</td>
                        <td style='font-size: 15px'>$val->name</td>
                        $deg
                    </tr>";
            endforeach;
            return trim($row);
        endif;
    }

    public function home()
    {
        if ( auth('governor')->check() ) :
            $governor = auth('governor')->user();
            
            $UserRegs = UserReg::with('standard:id,name','category:id,name')
            ->where('governor_id1', $governor->id)
            ->orWhere('governor_id2', $governor->id)
            ->orWhere('governor_id3', $governor->id)
            ->get();
            return view('auth-governor.home', compact('UserRegs', 'governor'));
        else:
            return redirect('/auth');
        endif;
    }
    
    public function updateHome(Request $request)
    {
        if ( auth('governor')->check() ) :
            $governor = auth('governor')->user();
            $validatedData = $request->validate([
                'degree' => 'required|integer|max:999999999',
                'id' => 'required|integer|exists:user_regs,id',
            ]);
            UserReg::where(['id'=>$request->id,'governor_id'=>$governor->id])->update([
                'degree' => $request->degree,
            ]);
            return back()->with('success', 'تم تحديث البيانات بنجاح');
        else:
            return redirect('/auth');
        endif;
    }


    public function profile()
    {
        if ( auth('governor')->check() ) :
            return view('auth-governor.profile');
        else:
            return redirect('/auth');
        endif;
    }
    
    public function profileUpdate(Request $request)
    {
        if ( auth('governor')->check() ) :

            $userData = auth('governor')->user();
            $validatedData = $request->validate([
                'name' => 'required|string|max:50',
                'phone' => 'required|numeric|digits_between:1,10',
            ]);
    
            if( empty($request->password) ):
                $user = Governor::select('id','password')->where('id',$userData->id)->first();
                $password = $user->password;
            else:
                $validatedData = $request->validate([
                    'password' => 'required|string|min:6|max:64',
                ]);
                $password = bcrypt($request->password);
            endif;
            Governor::where('id', $userData->id)
            ->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'password' => $password,
            ]);
            return back()->with('success', 'تم تحديث بيانات حسابك بنجاح');
        
        else:
            return redirect('/auth');
        endif;
    }

    
    public function login()
    {
        if ( auth('governor')->check() ):
            return redirect('/governor/home');
        else:
            return view('auth-governor.login');
        endif;
    }


    public function logout()
    {
        if ( auth('governor')->check() ):
            auth('governor')->logout();
            return redirect('/auth');
        endif;
        return redirect('/auth');
    }
    
    


}
