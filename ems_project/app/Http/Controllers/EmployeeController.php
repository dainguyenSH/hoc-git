<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Employee;
use Input;
use Image;
use Validator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employee.index', ['list_emp' => Employee::getAllEmployees()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $rules =[
                'employee_id' => 'required|unique:employees',
                'employee_name' => 'required|max:25',
                'email' => 'required|unique:employees|email'
            ];

            $messages = [
                'employee_id.required' => 'Yêu cầu mã nhân viên',
                'employee_id.unique' => 'Lỗi trùng lặp',
                'employee_name.required' => 'Yêu cầu tên nhân viên',
                'employee_name.max' => 'Tên chỉ được tối đa 25 ký tự',
                'email.required' => 'Yêu cầu email',
                'email.unique' => 'Lỗi trùng lặp',
                'email.email' => 'sai định dạng email'
            ];
            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }
            else {

                $employee = new Employee();
                $employee->employee_id = $request->input('employee_id');
                $employee->employee_name = $request->input('employee_name');
                $employee->sex = $request->input('sex');
                $employee->birthday = $request->input('birthday');
                $employee->address = $request->input('address');
                $employee->telephone = $request->input('telephone');
                $employee->email = $request->input('email');
                $employee->nationality = $request->input('nationality');

                if ($request->hasFile('photo')) {
                    $image = $request->file('photo');
                    $file_name = time(). '-' . $image->getClientOriginalName();

                    $image->move('upload/images', $file_name);

                    
                    $employee->photo = 'upload/images/' . $file_name;
                    
                }


                if($employee->save()) {
                    return redirect()->to('/');
                }
            }

            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('employee.info', ['employee' => Employee::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('employee.edit', ['employee' => Employee::findOrFail($id)]);
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
        $rules =[
                'employee_id' => 'required|unique:employees',
                'employee_name' => 'required|max:25',
                'email' => 'required|unique:employees|email'
            ];

            $messages = [
                'employee_id.required' => 'Yêu cầu mã nhân viên',
                'employee_id.unique' => 'Đã tồn tại',
                'employee_name.required' => 'Yêu cầu tên nhân viên',
                'employee_name.max' => 'Tên chỉ được tối đa 25 ký tự',
                'email.required' => 'Yêu cầu email',
                'email.unique' => 'Đã tồn tại',
                'email.email' => 'sai định dạng email'
            ];
            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }
            else {

                $employee = Employee::where('id', $id)->update([
                    'employee_id' => $request->input('employee_id'),
                    'employee_name' => $request->input('employee_name'),
                    'sex' => $request->input('sex'),
                    'birthday' => $request->input('birthday'),
                    'address' => $request->input('address'),
                    'telephone' => $request->input('telephone'),
                    'email' => $request->input('email'),
                    'nationality' => $request->input('nationality'),

                   
                ]);

                 if ($request->hasFile('photo')) {
                        $image = $request->file('photo');
                        $file_name = time(). '-' . $image->getClientOriginalName();

                        $image->move('upload/images', $file_name);

                        Employee::where('id', $id)->update([
                            'photo' => 'upload/images/' . $file_name
                        ]);
                        
                }

                return view('employee.index');
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::find($id)->delete();

        return response()->json([
                'error' => false,
                'messages' => 'success'
            ]);
    }
}
