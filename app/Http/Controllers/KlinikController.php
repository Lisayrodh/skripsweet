<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Klinik;
use App\Models\Klinik_About;
use App\Models\Publik;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class KlinikController extends Controller
{
    public function Index(){
        return view('klinik.klinik_login');
    }// end method

    // public function Dashboard()
    // {
    //     $username = Auth::user()->username;
    //     return view('klinik.dashboardklinik', compact('username'));
    // }


    //------------------------------------------------ Dashboard Utama -------------------------------------------------//
    public function Dashboard(){
        return view('klinik.dashboardklinik');
    }// End Method


    //------------------------------------------------ Login Klinik----------------------------------------------------//

    public function Login(Request $request){
        //dd($request->all());   <-----TO CHECK
        $check = $request->all();
        if(Auth::guard('klinik')->attempt(['email' => $check['email'], 'password' => $check['password'] ]))
        {
            return redirect()->route('klinik.dashboard')->with('success', 'Klinik Login Successfully!');
        }
        else{
            return back()->with('error', 'Invalid Email or Password.');
        }
    } //End Method


    //------------------------------------------------ Halaman About Klinik -------------------------------------------//


    public function about(){
        $abouts = Klinik_About::all();
        $user = Auth::guard('klinik')->user()->id;



        return view('klinik.abouts.klinik_about', [
            'data_exists' => $abouts->count() > 0 ? true : false,
            'abouts' => $abouts
        ]);
    }

    // untuk menampilkan form membuat about baru
    public function create()
    {
        return view('klinik.abouts.create');
    }

    //Menyimpan data baru ke dalam database
    public function store(Request $request)
    {
        $request->validate([
        'username' => 'required|string',
        'email' => 'required|email|unique:klinikabouts,email',
        'nama_klinik' => 'required|string',
        'alamat_lengkap' => 'required|string',
        'kecamatan' => 'required|string',
        'kabupaten' => 'required|string',
        'kode_pos' => 'required|string',
        'whatsapp' => 'required|string',
        'telephone' => 'required|string',
        'instagram' => 'nullable|string',
        'facebook' => 'nullable|string',
        'website_klinik' => 'nullable|string',
        'tentang_klinik' => 'nullable|string',
        // 'upload_gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk gambar
        ]);

        Klinik_About::create($request->all());

        return redirect()->route('klinik.abouts.klinik_about')
            ->with('success', 'Klinik about created successfully.');
    }

     // Method untuk menampilkan form edit yang ada
     public function edit(Klinik_About $klinikabout)
    {
        return view('klinik.abouts.edit', compact('klinikabout'));
    }

    //memperbarui klinik about yang ada di database
    public function update(Request $request, Klinik_About $klinikabout)
    {
        $request->validate([
        'username' => 'required|string',
        'email' => 'required|email|unique:klinikabouts,email',
        'nama_klinik' => 'required|string',
        'alamat_lengkap' => 'required|string',
        'kecamatan' => 'required|string',
        'kabupaten' => 'required|string',
        'kode_pos' => 'required|string',
        'whatsapp' => 'required|string',
        'telephone' => 'required|string',
        'instagram' => 'nullable|string',
        'facebook' => 'nullable|string',
        'website_klinik' => 'nullable|string',
        'tentangklinik' => 'nullable|string',
        'upload_gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk gambar
        ]);

        // Logika untuk menentukan apakah data telah ada sebelumnya
        // Misalnya, cek apakah data dengan ID tertentu sudah ada di database
        $dataExists = Klinik_About::where('id', $klinikabout->id)->exists();

        // Jika data tidak ada, Anda bisa mengembalikan tampilan dengan pesan error atau redirect ke halaman lain
        if (!$dataExists) {
            return redirect()->back()->with('error', 'Data not found');
        }

        // Jika data ada, lanjutkan dengan proses update
        $klinikabout->update($request->all());

        // Redirect ke halaman yang sesuai dengan pesan sukses
        return redirect()->route('klinik.abouts.klinik_about')
                ->with('success', 'Klinik about updated successfully');
}

    //menghapus klinik about dari database
    public function destroy(Klinik_About $klinikabout)
    {
        $klinikabout->delete();

        return redirect()->route('klinik.abouts.klinik_about')
            ->with('success', 'Klinik about deleted successfully');
    }


    public function Logout(){
        Auth::guard('klinik')->logout();
        return redirect()->route('login_from')->with('success', 'Klinik Logout Successfully!');
    } //End Method

    public function KlinikRegister(){
        return view('klinik.klinik_register');
    } //End Method

    public function KlinikRegisterCreate(Request $request){
        //dd($request->all());   //<-----TO CHECK

        Klinik::insert([
            'name'       => $request->name,
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('login_from')->with('success', 'Klinik Created Successfully!');
    } //End Method

    public function createNewUser(Request $request){
        //dd($request->all());   //<-----TO CHECK
        Publik::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('klinik.newUser')->with('success', 'New User Created Successfully!');
    } //End Method

    public function clientList(Request $id){
        $sellers = Publik::all();
        //dd($sellers);
        return view('klinik.client_list', compact('publik'));
    } // End Method

    public function deleteClient($id){
        $sellers = Publik::find($id)->delete();
        return redirect()->route('klinik.deleteClient')->with('success', 'User Deleted Successfully!');
        //return view('admin.clientList')->with('success', 'User Deleted Successfully!');
    } // End Method
}
