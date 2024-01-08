<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;
use App\Models\Appointment;
use Illuminate\Support\Facades\App;

class AppointmentController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function viewAppointments()
    {
        $appointments = Appointment::all();
        return view('appointment.view', ['appointments' => $appointments]);

    }

    public function create()
    {
        return view('appointment.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'alpha:ascii'],
            'lastName' => ['required', 'alpha:ascii'],
            'phoneNumber' => ['required', 'numeric', 'digits:9'],
            'email' => ['required', 'email:filter_unicode', 'string', 'lowercase'],
            'date' => ['required', 'date'],
        ]);

        $newAppointment = Appointment::create($data);

        return redirect(route('appointment.view'));
    }

    public function edit(Appointment $appointment)
    {
        return view('appointment.edit', ['appointment' => $appointment]);
    }

    public function update(Appointment $appointment, Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'regex:', 'max:255'],
            'lastName' => ['required', 'alpha:ascii', 'max:255'],
            'phoneNumber' => ['required', 'numeric', 'regex: /^[1-9]\d{8}$/'],
            'email' => ['required', 'email:filter_unicode'],
            'date' => ['required', 'date'],
        ]);

        $appointment->update($data);
        return redirect(route('appointment.view'))->with('success', 'Appointment Updated Successfully');
    }

    public function delete(Appointment $appointment)
    {
        $appointment->delete();
        return redirect(route('appointment.view'))->with('success', 'Appointment Deleted Successfully');
    }
}
