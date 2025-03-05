<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\clienrs\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $user;

    public function __construct()
    {
        $this->user = new Account();
    }

    public function index()
    {
        $email = session()->get('email');
        $user = $this->user->getUser($email);
        // dd($user);
        return view('client.info', compact('user'));
    }

    public function update_user(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'name' => 'required|max:255',
            'phone' => 'nullable|regex:/^[0-9]{10,15}$/',
            'address' => 'nullable|max:255',
            'email' => 'required|email|max:50',
        ], [
            'name.required' => 'Tên Không Được Để Trống',
            'email.required' => 'Email Không Được Để Trống',
            'name.max' => 'Tên Không được quá 255 ký tự',
            'phone.digits_between' => 'Số điện thoại phải từ 10 đến 15 ký tự',
            'address.max' => 'Địa chỉ Không được quá 255 ký tự',
            'email.email' => 'Email không đúng định dạng',
            'email.max' => 'Email Không được quá 50 ký tự',
        ]);
        // dd($data);
        $email = session()->get('email');
        $id = $this->user->getUserId($email);
        $user = Account::find($id);
        $user->user_name = $data['name'];
        $user->email = $data['email'];
        $user->user_phone = $data['phone'] ?? null;
        $user->user_address = $data['address'] ?? null;

        toastr()->success('Cập Nhập Thành Công');
        $user->save();
        return redirect()->route('info');
        // dd($user);
    }
    /**
     * Display the specified resource.
     */
    
     public function update_avata(Request $request){
        $data = $request->validate([
            'avata' => 'required|file|mimes:jpg,png,jpeg|max:2048'
        ],[
            'avata.required' => 'Bạn chưa chọn ảnh đại diện',
            'avata.file' => 'Bạn chỉ được chọn file ảnh',
            'avata.mimes' => 'Bạn chỉ được chọn file ảnh jpg, png, jpeg',
            'avata.max' => 'Kích thước ảnh không quá 2MB'
        ]);
        $email = session()->get('email');
        $id = $this->user->getUserId($email);
        $user = Account::find($id);
        // dd($user);
        if ($request->hasFile('avata')) {
            // Xóa ảnh cũ nếu tồn tại
            if (!empty($user->avata)) {
                $old_image_path = public_path('upload/avatas/' . $user->avata);
                if (file_exists($old_image_path)) {
                    unlink($old_image_path);
                }
            }
    
            // Upload ảnh mới
            $get_image = $request->file('avata');
            $path = 'upload/avatas/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = pathinfo($get_name_image, PATHINFO_FILENAME);
            $new_image = $name_image . rand(0, 999) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move(public_path($path), $new_image);
            // dd($new_image);
            // Cập nhật ảnh mới vào database
            $user->avata = $new_image;
        } 
        toastr()->success('Cập Nhập Thành Công');
        $user->save();
        return redirect()->route('info');
     }

     

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
