<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|max:255',
            'mail' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:4|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    // $date の中が配列（dataの数複数）になっているのでarrayを書く必要
    {
        return User::create([
            // usermodelはusertableとつながっている

            // migrationの設計でusertableが作られている

            'username' => $data['username'],
            'mail' => $data['mail'],
            'password' => bcrypt($data['password']),
            // bcrypy パスワード暗号化するため使う
        ]);
    }


    // public function registerForm(){
    //     return view("auth.register");
    // }

    public function register(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();
// $requestの中にformFatherdから送った情報が入ってる　その情報をinput で取り出す　取り出した情報は$dataとイコールになっている
            $this->create($data);
            // $thisこのファイルの中の　create を使う
            return redirect('added');
            // redirect()の中に書いてあるurlでrooting行う　get通信
        }
        return view('auth.register');
    }

    public function added(){
        return view('auth.added');
        // view()の中に書いているviewファイルを画面に表示する
    }
}
