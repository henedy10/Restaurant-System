<?php

namespace App\Http\Controllers;

use App\Http\Requests\client\
{
    storeBookingTable,
    storeSubscribers,
    storeContactMessage
};

use App\Services\Client\ClientService;

class ClientController extends Controller
{
    protected ClientService $client;

    public function __construct(ClientService $client)
    {
        $this->client = $client;
    }

    public function index()
    {
        $data = $this->client->index();

        return view('client.index',compact('data'));
    }

    public function storeBookingTable(storeBookingTable $request)
    {
        $this->client->storeBookingTable($request->validated());
        return redirect()->back()->with('success','تم تسجيل الحجز بنجاح');
    }

    public function storeSubscribers(storeSubscribers $request)
    {
        $this->client->storeSubscribers($request->validated());
        return redirect()->back()->with('success','تم تسجيل الحساب بنجاح');
    }

    public function storeContactMessage(storeContactMessage $request)
    {
        $this->client->storeContactMessage($request->validated());
        return redirect()->back()->with('contactMsgSuccess','تم تسجيل الرسالة بنجاح');
    }

    public function downloadMenu()
    {
        return response()->download(storage_path('app/public/Menu.jpg'));
    }
}
