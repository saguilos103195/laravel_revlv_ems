<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Employee;

use \Storage;

use Carbon\Carbon;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('pages.employees', [
            'employees' => Employee::all()
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pic = md5(Carbon::now());
        $employee = new Employee;
        $employee->pic = $pic;
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->position = $request->position;
        $employee->birth_date = $request->birth_date;
        $employee->status = 'active';
        if($request->files != null)
        {
            $file = $request->file('employee_pic');
            $filename = $pic . '.jpg';
            $destinationPath = config('app.fileDestinationPath') . '/' . $filename;
            $uploaded = Storage::put($destinationPath, file_get_contents($file->getRealPath()));
        }
        $employee->save();


        return redirect('/employees');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pages.editemp', [
            'employee' => Employee::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $pic = md5(Carbon::now());
        $employee = Employee::find($id);
        $employee->pic = $pic;
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->position = $request->position;
        $employee->birth_date = $request->birth_date;
        if($request->files != null)
        {
            echo 'meron';
            $file = $request->file('employee_pic');
            $filename = $pic . '.jpg';
            $destinationPath = config('app.fileDestinationPath') . '/' . $filename;
            $uploaded = Storage::put($destinationPath, file_get_contents($file->getRealPath()));
        }
        $employee->save();
        return redirect('/employees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        if($employee->status == 'active')
        {
            $employee->status = 'inactive';
        }
        else
        {
            $employee->status = 'active';
        }

        $employee->save();
        return redirect('/employees');
    }
}
