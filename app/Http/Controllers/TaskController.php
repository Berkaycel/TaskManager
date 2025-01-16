<?php

namespace App\Http\Controllers;

use App\Library\Repositories\Interfaces\DeveloperRepositoryInterface;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;

class TaskController extends Controller
{
    public function __construct(
        private readonly DeveloperRepositoryInterface $developerRepository
    ){}
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return view('admin.developers.index');
        } catch (\Throwable $th) {
            Log::error('There is an error occured when developers page loading process! Error Message: '.$th->getMessage());
            return redirect()->back()->with('error', 'There is an error occured when developers page loading process!');
        }     
    }

    public function listDevelopers()
    {
        try {
            $developers = $this->developerRepository->getAll();
            return Response::json($developers);
        } catch (\Throwable $th) {
            Log::error('There is an error occured when developers data fetching process! Error Message: '.$th->getMessage());
            return Response::json([
                "status" => false,
                "message" => "There is an error occured when developers data fetching process!"
            ], 422);
        }
    }
   
}
