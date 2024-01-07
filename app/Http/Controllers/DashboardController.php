<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\reservation_group;
use App\Models\group_member;
use App\Models\feedback;
use App\Models\pengunjung;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Decrypt;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\feedbackExport;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function userRole()
    {
        $users = User::all();
        return view('admin.userRole',compact('users'));
    }

    public function userRoleCreate()
    {
        return view('admin.userRoleCreate');
    }

    public function userRoleStore(Request $request)
    {
        $validateuser = $request->validate([
            'name' => 'required|max:32|unique:users',
            'password' => 'required|min:8',
        ]);
        
        $validateuser['password'] = Hash::make($validateuser['password']);

        User::create($validateuser);

        return redirect('/userRole')->with('success', 'User Berhasil ditambahkan'); 
    }

    public function userRoleEdit($id)
    {
        $users = User::where('id', $id)->first();
        $roles = Role::all();
        return view('admin.userRoleEdit',compact('users','roles'));
    }

    public function userRoleUpdate(Request $request, $id)
    {
        $users = User::where('id', $id)->first();
        $roles = Role::where('id', $request->role)->first();
        $users->assignRole($roles);
        
        return redirect('/userRole')->with('success', 'Data sudah di Ubah'); 
    }

    public function rolePermission()
    {
        $roles = Role::all();
        return view('admin.rolePermission',compact('roles'));
    }

    public function createNewRoles(Request $request)
    {
        $roles = Role::all();

        foreach($roles as $role){
           if (strtolower($request->role) ==  strtolower($role->name)){
                return redirect('/rolePermission')->with('success', 'Role sudah ada'); 
           }

        }
        
        $newRole = Role::create([
            'name' => $request->role,
        ]);
        
        $registrationPermission = Permission::where('name', 'registration')->first();
        $settingPermission = Permission::where('name', 'setting')->first();
        $userRolePermission = Permission::where('name', 'userRole')->first();
        $checkinPermission = Permission::where('name', 'checkin')->first();
        $feedbackPermission = Permission::where('name', 'feedback')->first();
        
        $newRole->givePermissionTo($registrationPermission);
        $newRole->givePermissionTo($checkinPermission);
        $newRole->givePermissionTo($feedbackPermission);
        
        return redirect('/rolePermission')->with('success', 'Role Baru sudah ditambahkan'); 
    }

    public function rolePermissionEdit($id)
    {
        $role = Role::where('id', $id)->first();
        return view('admin.rolePermissionEdit',compact('role'));
    }

    public function roleDelete(Request $request)
    {
        
        $role = Role::where('id', $request->id)->first();

        $role->delete();
        
        return redirect('/rolePermission')->with('success', 'Role sudah dihapus'); 
    }

    public function rolePermissionUpdate(Request $request, $id)
    {
        $registrationPermission = Permission::where('name', 'registration')->first();
        $settingPermission = Permission::where('name', 'setting')->first();
        $userRolePermission = Permission::where('name', 'userRole')->first();
        $checkinPermission = Permission::where('name', 'checkin')->first();
        $feedbackPermission = Permission::where('name', 'feedback')->first();
        
        $role = Role::where('id', $id)->first();
        
        if ($request->has('registration')) {
            
            $role->givePermissionTo($registrationPermission);
        } else {
            $role->revokePermissionTo($registrationPermission);
        }
        if ($request->has('setting')) {
            
        $role->givePermissionTo($settingPermission);
        } else {
            $role->revokePermissionTo($settingPermission);
        }
        if ($request->has('userRole')) {
            
        $role->givePermissionTo($userRolePermission);
        } else {
            $role->revokePermissionTo($userRolePermission);
        }
        if ($request->has('checkin')) {
            
        $role->givePermissionTo($checkinPermission);
        } else {
            $role->revokePermissionTo($checkinPermission);
        }
        if ($request->has('feedback')) {
            
        $role->givePermissionTo($feedbackPermission);
        } else {
            $role->revokePermissionTo($feedbackPermission);
        }

        return redirect('/rolePermission')->with('success', 'Data sudah di Ubah'); 

    }

    public function checkinDashboard(Request $request)
    {
        $reservasi_group = $reservation_group = reservation_group::whereNotNull('attend_confirmation_at')->paginate(10);
        return view('admin.checkinDashboard',compact('reservasi_group'));
    }

    public function checkinDashboardDelete(Request $request)
    {
        if($request['id'] == 0 ||$request['id'] ==  null ) {
            return redirect('/checkinDashboard')->with('success', 'Minimal pilih satu data untuk dihapus'); 
        }

        $count = count($request['id']);
        
        for ($i = 0 ; $i < $count ; $i++ ) {
            
            reservation_group::where('id', $request['id'][$i])->update([
                'registration_confirmation_at' => null,
                'email_verified_at' => null,
                'group_code' => null,
                'attend_confirmation_at' => null,
                'feedback_sent_at' => null,
            ]);
        }  
        
        return redirect('/checkinDashboard')->with('success', 'Data sudah berhasil di Hapus'); 
    }
    
    public function registrationDashboard(Request $request)
    {
        $reservasi_group = $reservation_group = reservation_group::whereNotNull('group_code')->whereNotNull('registration_confirmation_at')->paginate(10);
        
        foreach ($reservation_group as $group) {
            $group->encrypted_column = Crypt::encrypt($group->id);
        }

        return view('admin.registrationDashboard',compact('reservasi_group'));
        
    }

    public function registrationDashboardDelete(Request $request)
    {
        if($request['id'] == 0 ||$request['id'] ==  null ) {
            return redirect('/registrationDashboard')->with('success', 'Minimal pilih satu data untuk dihapus'); 
        }
        
        $count = count($request['id']);

        for ($i = 0 ; $i < $count ; $i++ ) {

            reservation_group::where('id', $request['id'][$i])->update([
                'registration_confirmation_at' => null,
                'email_verified_at' => null,
                'group_code' => null,
            ]);
        }  
        
        return redirect('/registrationDashboard')->with('success', 'Data sudah berhasil di Hapus'); 
        
    }

    public function registrationDashboardDetail($encrypt)
    {
        $decryptedCode = Crypt::decryptString($encrypt);
        $decryptedCode = str_replace(":", "", $decryptedCode);
        $decryptedCode = str_replace("i", "", $decryptedCode);
        $decryptedCode = str_replace(";", "", $decryptedCode);
        $reservasi_group = $reservation_group = reservation_group::where('id', $decryptedCode)->first();

        return view('admin.registrationDashboardDetail',compact('reservasi_group'));
    }

    public function feedbackDashboard()
    {
        $feedbacks = feedback::paginate(10);
        return view('admin.feedbackDashboard', compact('feedbacks'));
    }
  
    public function Dashboard()
    {
        $Chart = new \stdClass();

        $Chart->visitorLv1 = group_member::Join('pengunjung', 'group_member.pengunjung_id', 'pengunjung.id')
                                            ->Join('reservation_groups', 'group_member.reservasi_id', 'reservation_groups.id')
                                            ->where('Kehadiran', '1')
                                            ->whereBetween('age', [1, 10])->count();

        $Chart->visitorLv2 = group_member::Join('pengunjung', 'group_member.pengunjung_id', 'pengunjung.id')
                                            ->Join('reservation_groups', 'group_member.reservasi_id', 'reservation_groups.id')
                                            ->where('Kehadiran', '1')
                                            ->whereBetween('age', [11, 20])->count();
                                            
        $Chart->visitorLv3 = group_member::Join('pengunjung', 'group_member.pengunjung_id', 'pengunjung.id')
                                            ->Join('reservation_groups', 'group_member.reservasi_id', 'reservation_groups.id')
                                            ->where('Kehadiran', '1')
                                            ->whereBetween('age', [21, 30])->count();

        $Chart->visitorLv4 = group_member::Join('pengunjung', 'group_member.pengunjung_id', 'pengunjung.id')
                                            ->Join('reservation_groups', 'group_member.reservasi_id', 'reservation_groups.id')
                                            ->where('Kehadiran', '1')
                                            ->whereBetween('age', [31, 40])->count();

        $Chart->visitorLv5 = group_member::Join('pengunjung', 'group_member.pengunjung_id', 'pengunjung.id')
                                            ->Join('reservation_groups', 'group_member.reservasi_id', 'reservation_groups.id')
                                            ->where('Kehadiran', '1')
                                            ->whereBetween('age', [41, 50])->count();

        $Chart->visitorLv6 = group_member::Join('pengunjung', 'group_member.pengunjung_id', 'pengunjung.id')
                                            ->Join('reservation_groups', 'group_member.reservasi_id', 'reservation_groups.id')
                                            ->where('Kehadiran', '1')
                                            ->whereBetween('age', [51, 60])->count();

        $Chart->visitorLv7 = group_member::Join('pengunjung', 'group_member.pengunjung_id', 'pengunjung.id')
                                            ->Join('reservation_groups', 'group_member.reservasi_id', 'reservation_groups.id')
                                            ->where('Kehadiran', '1')
                                            ->whereBetween('age', [61, 100])->count();

        $Chart->visitorMale = group_member::Join('pengunjung', 'group_member.pengunjung_id', 'pengunjung.id')
                                            ->Join('reservation_groups', 'group_member.reservasi_id', 'reservation_groups.id')
                                            ->where('Kehadiran', '1')
                                            ->where('gender', 'male')->count();

        $Chart->visitorFemale = group_member::Join('pengunjung', 'group_member.pengunjung_id', 'pengunjung.id')
                                            ->Join('reservation_groups', 'group_member.reservasi_id', 'reservation_groups.id')
                                            ->where('Kehadiran', '1')
                                            ->where('gender', 'female')->count();
                                            
        $Chart->institutionCategory_Government = group_member::Join('pengunjung', 'group_member.pengunjung_id', 'pengunjung.id')
                                                ->Join('reservation_groups', 'group_member.reservasi_id', 'reservation_groups.id')
                                                ->whereNotNull('attend_Confirmation_at')
                                                ->where('intitution_category', 'Government')->count();

        $Chart->institutionCategory_Association = group_member::Join('pengunjung', 'group_member.pengunjung_id', 'pengunjung.id')
                                                ->Join('reservation_groups', 'group_member.reservasi_id', 'reservation_groups.id')
                                                ->where('Kehadiran', '1')
                                                ->where('intitution_category', 'Association')->count();
                                                
        $Chart->institutionCategory_University = group_member::Join('pengunjung', 'group_member.pengunjung_id', 'pengunjung.id')
                                                ->Join('reservation_groups', 'group_member.reservasi_id', 'reservation_groups.id')
                                                ->where('Kehadiran', '1')
                                                ->where('intitution_category', 'University')->count();

        $Chart->institutionCategory_SHS = group_member::Join('pengunjung', 'group_member.pengunjung_id', 'pengunjung.id')
                                                ->Join('reservation_groups', 'group_member.reservasi_id', 'reservation_groups.id')
                                                ->where('Kehadiran', '1')
                                                ->where('intitution_category', 'Vocational')->count();

        $Chart->institutionCategory_Internal = group_member::Join('pengunjung', 'group_member.pengunjung_id', 'pengunjung.id')
                                                ->Join('reservation_groups', 'group_member.reservasi_id', 'reservation_groups.id')
                                                ->where('Kehadiran', '1')
                                                ->where('intitution_category', 'Internal')->count();

        $Chart->institutionCategory_Supply = group_member::Join('pengunjung', 'group_member.pengunjung_id', 'pengunjung.id')
                                                ->Join('reservation_groups', 'group_member.reservasi_id', 'reservation_groups.id')
                                                ->where('Kehadiran', '1')
                                                ->where('intitution_category', 'Supply Chain')->count();

        $Chart->institutionCategory_Media = group_member::Join('pengunjung', 'group_member.pengunjung_id', 'pengunjung.id')
                                                ->Join('reservation_groups', 'group_member.reservasi_id', 'reservation_groups.id')
                                                ->where('Kehadiran', '1')
                                                ->where('intitution_category', 'Media')->count();

        $Chart->institutionCategory_KOL = group_member::Join('pengunjung', 'group_member.pengunjung_id', 'pengunjung.id')
                                                ->Join('reservation_groups', 'group_member.reservasi_id', 'reservation_groups.id')
                                                ->where('Kehadiran', '1')
                                                ->where('intitution_category', 'Key Opinion Leader')->count();

        $Chart->institutionCategory_Public = group_member::Join('pengunjung', 'group_member.pengunjung_id', 'pengunjung.id')
                                                ->Join('reservation_groups', 'group_member.reservasi_id', 'reservation_groups.id')
                                                ->where('Kehadiran', '1')
                                                ->where('intitution_category', 'Public')->count();

        $Chart->visitorArival = group_member::where('kehadiran', 1)->count();
        $Chart->waitingList = reservation_group::whereNotNull('group_code')->whereNotNull('email_verified_at')->count();
        $Chart->feedback = feedback::count();
        
        $Chart->howTheyKnow_LinkedIn = feedback::where('how_they_know', 'Linkedin')->count();
        $Chart->howTheyKnow_Instagram = feedback::where('how_they_know', 'Instagram')->count();
        $Chart->howTheyKnow_Internal = feedback::where('how_they_know', 'Internal Toyota info')->count();
        $Chart->howTheyKnow_News = feedback::where('how_they_know', 'News')->count();
        $Chart->howTheyKnow_Friend = feedback::where('how_they_know', 'Friend / Family')->count();
        $Chart->howTheyKnow_Friend = feedback::where('how_they_know', 'Youtube')->count();
        $Chart->howTheyKnow_Other = $Chart->feedback - ($Chart->howTheyKnow_LinkedIn + $Chart->howTheyKnow_Instagram + $Chart->howTheyKnow_Internal + 
        $Chart->howTheyKnow_News + $Chart->howTheyKnow_Friend);
        
        $Chart->knowledgeBefore_bad = feedback::where('knowledge_before_xev', '1')->count();
        $Chart->knowledgeBefore_fair = feedback::where('knowledge_before_xev', '2')->count();
        $Chart->knowledgeBefore_average = feedback::where('knowledge_before_xev', '3')->count();
        $Chart->knowledgeBefore_good = feedback::where('knowledge_before_xev', '4')->count();
        $Chart->knowledgeBefore_execellent = feedback::where('knowledge_before_xev', '5')->count();

        $Chart->knowledgeAfter_bad = feedback::where('knowledge_after_xev', '1')->count();
        $Chart->knowledgeAfter_fair = feedback::where('knowledge_after_xev', '2')->count();
        $Chart->knowledgeAfter_average = feedback::where('knowledge_after_xev', '3')->count();
        $Chart->knowledgeAfter_good = feedback::where('knowledge_after_xev', '4')->count();
        $Chart->knowledgeAfter_execellent = feedback::where('knowledge_after_xev', '5')->count();

        $Chart->knowledgeIncrease_xev = feedback::where('knowledge_increases', 'LIKE', '%xEv Ecosystem%')->count();
        $Chart->knowledgeIncrease_MPA = feedback::where('knowledge_increases', 'LIKE', '%Differences of xEV%')->count();
        $Chart->knowledgeIncrease_Differences = feedback::where('knowledge_increases', 'LIKE', '%Multi pathway approaches%')->count();
        $Chart->knowledgeIncrease_other = feedback::whereNotNull('knowledge_other')->count();

        $Chart->InterestedCar_HEV = feedback::where('car_series', 'HEV')->count();
        $Chart->InterestedCar_PHEV = feedback::where('car_series', 'PHEV')->count();
        $Chart->InterestedCar_BEV = feedback::where('car_series', 'BEV')->count();
        $Chart->InterestedCar_FCEV = feedback::where('car_series', 'FCEV')->count();

        $Chart->InterestedCarType_MPV5 = feedback::where('car_type', 'MPV 5 Seater')->count();
        $Chart->InterestedCarType_SUV5 = feedback::where('car_type', 'SUV 5 Seater')->count();
        $Chart->InterestedCarType_Small = feedback::where('car_type', 'Small 2 Seaters Car')->count();
        $Chart->InterestedCarType_MPV7 = feedback::where('car_type', 'MPV 7 Seater')->count();
        $Chart->InterestedCarType_SUV7 = feedback::where('car_type', 'SUV 7 Seater')->count();
        $Chart->InterestedCarType_Sedan = feedback::where('car_type', 'Sedan')->count();

        return view('admin.mainDashboard', compact('Chart'));
    }
   
    public function downloadFeedback()
    {
        $feedbacks = pengunjung::join('feedback', 'pengunjung.id', 'feedback.pengunjung_id')->get();
        return Excel::download(new feedbackExport($feedbacks), 'feedbacks.xlsx');
    }

    public function FeedbackDelete(Request $request)
    {
        if($request['id'] == 0 ||$request['id'] ==  null ) {
            return redirect('/feedbackDashboard')->with('success', 'Minimal pilih satu data untuk dihapus'); 
        }

        $count = count($request['id']);

        for ($i = 0 ; $i < $count ; $i++ ) {
            
            $reservasi = feedback::find($request['id'][$i]);
            $reservasi->delete();
        }  
        
        return redirect('/feedbackDashboard')->with('success', 'Data sudah berhasil di Hapus'); 
    }

}
