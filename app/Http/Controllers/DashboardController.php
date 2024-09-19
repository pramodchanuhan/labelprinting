<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use App\Notifications\StatusNotification;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function dashboard(){
        // return view('index');
        // $this->authorize('iat access')
        $redirect='/dashboard';
        if(auth()->user()->hasRole(['super admin','admin']))
        {
            $redirect='admin-dashboard';
        }
        else{
            $redirect='employee-dashboard';
        }

        return redirect($redirect);
    }

    public function admin_dashboard(){
        return view('index');
    }

    public function employee_dashboard(){
        return view('employee-dashboard');
    }

    public function notifications(){
        return view('notifications');
    }

    public function delete_notification(Notification $id)
    {
        // $notification = auth()->user()->notifications->find($id)->delete();
        $notification = $id->delete();
        return response()->json(['message' => "successfully deleted"]);
    }

    public function unread_all_notification()
    {
        // $unread_notification = auth()->user()->notifications->where('notifiable_id', auth()->user()->id);
        $unread_notifications = auth()->user()->unreadnotifications;
        foreach ($unread_notifications as $key => $value) {
            $value->markAsRead();
        }
        return back()->with('success', 'All notifications has been cleared successfully !');;
    }


}
