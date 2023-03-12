<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function saveToken(Request $request)
    {
        // all user device token null
        $user = User::whereNotNull('device_token')->get();
        foreach ($user as $key => $value) {
            $value->device_token = null;
            $value->save();
        }
        $user = User::find($request->user_id);
        $user->device_token = $request->token;
        $user->save();
        return response()->json(['success' => 'Token saved successfully.']);
    }


    public function sendNotification($userId, $title, $message)
    {
        $firebaseToken = User::where('id', $userId)->pluck('device_token')->all();
        $SERVER_API_KEY = "AAAAhS-bbG0:APA91bE2zUxinhHMN7iJpV-lEqFHBnxOE8jrgyfYzOYg6GLWz0QVpnRRpmJu7gxpEXJk7O0-xW7KT1JEzISybWAsqdmrUlAXyCg4UlzEiBAg-p0MppEXEnXnRtllkK02vBE4Z-sBX9hW";

        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => $title,
                "body" => $message,
            ]
        ];
        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($ch);


        // $user = User::whereNotNull('device_token')->get();
        // foreach ($user as $key => $value) {
        //     $value->device_token = null;
        //     $value->save();
        // }
        return response()->json([
            'success' => 'Notification sent successfully.',
            'response' => $response,
            200
        ]);
    }
}
