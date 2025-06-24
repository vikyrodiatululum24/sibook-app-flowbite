<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
  public function index()
  {
    $limit = 20; // default limit 20
    $notifications = Notification::where('is_read', false)
      ->orderBy('created_at', 'desc')
      ->limit($limit)
      ->get();
    return response()->json($notifications);
  }

  public function unreadCount()
  {
    $count = Notification::where('is_read', false)->count();
    return response()->json(['count' => $count]);
  }

  public function markAsRead($id)
  {
    
    $notification = Notification::find($id);
    if ($notification) {
      $notification->is_read = true;
      $notification->save();
    }
    return response()->json(['success' => true]);
  }
}
