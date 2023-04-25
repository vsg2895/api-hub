<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientStoreRequest;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Laravel\Passport\ClientRepository;
use function GuzzleHttp\Promise\all;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('clients.index', ['clients' => Client::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ClientStoreRequest $request, ClientRepository $clientRepository)
    {
        try {
            $types = Client::getClientTypeOptions($request->type);
            $clientRepository->create(null, $request->name, $request->redirect, null, $types[0], $types[1]);

            return redirect()->route('clients.index')->with('success', 'Client created successfully');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Client $client
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Client $client
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Client $client
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Client $client, ClientStoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        try {
            $types = Client::getClientTypeOptions($request->type);
            $updated = array_merge(Arr::except($request->validated(), 'type'),
                                   ['personal_access_client' => $types[0], 'password_client' => $types[1]]);
            $client->update($updated);

            return redirect()->route('clients.index')->with('success', 'Client updated successfully');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Client $client
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Client $client)
    {
        try {
            $client->delete();

            return redirect()->back()->with('success', 'Client deleted successfully');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
