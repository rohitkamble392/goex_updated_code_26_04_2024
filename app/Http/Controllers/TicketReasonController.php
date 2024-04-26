<?php

namespace App\Http\Controllers;
use App\Http\Controllers\TicketReasonController;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class TicketReasonController extends Controller
{
    public function index()
    {

        $apiEndpoint = 'https://spillas.in/api/Incident/GetTicketReason';

        $bearerToken = session('Token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->get($apiEndpoint);
        
        if ($response->successful()) {

            $responseData = $response->json();
            $getticketreason = $responseData;

            return view('pages.all-ticket-reason', compact('getticketreason'));
        } else {
            return response()->json(['error' => 'Failed to fetch data'], $response->status());
        }
    }
    public function addTicketReasonView()
    {
        return view('pages.add-ticket-reason');
    }

    public function createTicketReason(Request $request)
    {
        $data = [
            'ticketReason' => $request->input('ticketReason'),
            "createdBy"=> 0
        ];

        $apiEndpoint = 'https://spillas.in/api/Incident/CreateTicketReason';

        $bearerToken = session('Token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->post($apiEndpoint,$data);

        if ($response) {
            $responseData = $response->json();
            $ticketreason = $responseData;
            // dd($response);
            return redirect('/all-ticket-reasons')->with('success', 'Operation completed successfully!');
        } else {
            // Handle the error
            return $response->json();
        }

    }

    public function delete($id)
    {
        $data = [
            'userID' => $id,
            'id' => $id,
            'statusId' => 0
        ];
        $apiEndpoint = 'https://spillas.in/api​/Incident​/DeleteTicketReason';

        $bearerToken = config('services.api.bearer_token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->post($apiEndpoint,$data);

        if ($response->successful()) {
            $responseData = $response->json();

            return redirect('/all-ticket-reason')->with('success', 'Operation completed successfully!');
        } else {
            return $response->json();
        }
    }

    public function GettaskList()
    {

        $apiEndpoint = 'https://spillas.in/api/Incident/GettaskList';

        $bearerToken = session('Token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->get($apiEndpoint);
        
        if ($response->successful()) {

            $responseData = $response->json();
            $gettasklist = $responseData;

            return view('pages.all-task-list', compact('gettasklist'));
        } else {
            return response()->json(['error' => 'Failed to fetch data'], $response->status());
        }
    }

    public function addTaskListView()
    {
        return view('pages.add-task-list');
    }

    public function createTaskList(Request $request)
    {
        $data = [
            'taskName' => $request->input('taskName'),
            "createdBy"=> 1
        ];

        $apiEndpoint = 'https://spillas.in/api/Incident/AddTaskList';

        $bearerToken = session('Token');

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $bearerToken,
            'Accept' => '*/*'
        ])->post($apiEndpoint,$data);

        if ($response) {
            $responseData = $response->json();
            $tasklist = $responseData;
            // dd($response);
            return redirect('/all-task-list')->with('success', 'Operation completed successfully!');
        } else {
            // Handle the error
            return $response->json();
        }

    }
    
}