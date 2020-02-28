<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\EmailSMSController;
use App\Http\Controllers\Controller;
use App\Model\Roles;
use App\User;
use Auth;
use DB;
use Illuminate\Http\Request;
use Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(EmailSMSController $EmailSMSController)
    {
        $this->EmailSMSController = $EmailSMSController;
    }
    public function index()
    {

        $users = new User();
        if (Auth::user()->role_id == 1) {
            $users = $users->get();
        } elseif (Auth::user()->role_id == 2) {
            $users = $users->where('created_by', Auth::id())->get();
        }

        return view('Admin.Users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Roles::pluck('role_name', 'id');
        $country_code = DB::table('countries')->pluck('dial_code', 'dial_code');
        return view('Admin.Users.create', compact('country_code', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:6|confirmed',
            'dial_code' => 'required',
            'role_id' => 'required',
            'gst_number' => 'required',
            'dob' => 'required',
            'mobile' => 'required',
        ]);

        try {
            DB::beginTransaction();
            User::create([
                'first_name' => $request->get('first_name'),
                'last_name' => $request->get('last_name'),
                'email' => $request->get('email'),
                'password' => \Hash::make($request->get('password')),
                'dial_code' => $request->get('dial_code'),
                'mobile' => $request->get('mobile'),
                'gst_number' => $request->get('gst_number'),
                'dob' => $request->get('dob'),
                'role_id' => (int) $request->get('role_id'),
                'status' => $request->get('status'),
                'api_token' => Str::random(60),
                'created_by' => \Auth::id(),
            ]);
            //fetch data from email template.
            // $EmailTemplate = EmailTemplate::whereId(1)->first();

            // //create a array for email body
            // $data = array(
            //     '{var_first_name}' => $request->get('first_name'),
            //     '{var_last_name}' => $request->get('last_name'),
            //     '{var_email}' => $request->get('email'),
            //     '{var_mobile_number}' => $request->get('mobile_number'),
            //     'to' => $request->get('email'),
            //     'subject' => $EmailTemplate->email_subject,
            // );
            // //for get a email template body.
            // $body = $EmailTemplate->email_body;

            // foreach ($data as $key => $value) {
            //     //replace the email template body string to user detail
            //     $body = str_replace($key, $value, $body);
            // }
            // // dd($EmailTemplate,$body);

            // //send to the email controller for sending a mail.
            // $this->EmailSMSController->send_email($body, $data);

            DB::commit();

            return redirect()->to('users')->with('success', 'User created successfully');

        } catch (\Throwable $th) {
            DB::rollback();

            return redirect()->back()->with('error', 'Internal server error!')->withInputs();
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

        //for getting user details.
        $users = User::whereId($id)->first();
        $roles = Roles::pluck('role_name', 'id');
        //for getting a country code
        $country_code = DB::table('countries')->pluck('dial_code', 'dial_code');
        return view('Admin.Users.edit', compact('users', 'country_code', 'roles'));
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
        // dd($request);
        //for request validation
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:6|confirmed',
            'dial_code' => 'required',
            'role_id' => 'required',
            'gst_number' => 'required',
            'dob' => 'required',
            'mobile' => 'required',
        ]);
        //if admin request for change user password so check validation.
        if ($request->get('password') != null) {
            $this->validate($request, [
                'password' => 'required|min:6|confirmed',
            ]);
        }

        try {
            DB::beginTransaction();
            //create a new array for request user detail .
            $data = array(
                'first_name' => $request->get('first_name'),
                'last_name' => $request->get('last_name'),
                'email' => $request->get('email'),
                'dial_code' => $request->get('dial_code'),
                'mobile' => $request->get('mobile'),
                'gst_number' => $request->get('gst_number'),
                'dob' => $request->get('dob'),
                'role_id' => (int) $request->get('role_id'),
                'status' => $request->get('status'),
                'api_token' => Str::random(60),
                'created_by' => \Auth::id(),
            );
            //for change a password.
            if ($request->get('password') != null) {
                $data['password'] = \Hash::make($request->get('password'));
            }
            //update data in database.
            User::whereId($id)->update($data);

            DB::commit();

            return redirect()->to('users')->with('success', 'User updated error');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Internal server error!')->withInput();
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

        User::destroy($id);

        return response()->json(['success' => 'User deleted successfully!']);

    }
    /**
     * Change the specified status from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request, $id)
    {

        try {

            DB::beginTransaction();

            User::whereId($id)->update([
                'status' => $request->get('status'),
            ]);

            DB::commit();

        } catch (Exception $e) {
            DB::rollback();

            return redirect()->back()->with('error', 'Internal server error');
        }

        return response()->json([
            'success' => 'Status change successfully!',
        ]);

    }
}
