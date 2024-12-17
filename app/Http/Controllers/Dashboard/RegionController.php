<?php
namespace App\Http\Controllers\Dashboard;

use App\Models\Province;
use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegionController extends Controller
{
    public function index()
    {
        $provinces = Province::with('cities')->get();
        return view('dashboard.regions.index', [
            'title' => 'Daftar Region',
            'provinces' => $provinces,
        ]);
    }

    public function create()
    {
        return view('dashboard.regions.create', [
            'title' => 'Tambah Region',
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'cities' => 'required|array',
            'cities.*' => 'required|string|max:255',
        ]);

        $province = Province::create(['name' => $request->name]);

        foreach ($request->cities as $cityName) {
            $province->cities()->create(['name' => $cityName]);
        }

        return redirect()->route('dashboard.regions.index')->with('success', 'Region berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $province = Province::findOrFail($id);

        // Hapus semua kota yang terkait dengan provinsi
        $province->cities()->delete();
        // Hapus provinsi
        $province->delete();
        return redirect()->route('dashboard.regions.index')->with('success', 'Region berhasil dihapus');
    }

    public function getCitiesByProvince($province_id)
    {
        $cities = City::where('province_id', $province_id)->get();
        return response()->json($cities);
    }
}