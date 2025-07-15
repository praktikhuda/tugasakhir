<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

function settings($key = null, $default = null)
{
    if (is_null($key)) {
        return app('anlutro\LaravelSettings\SettingStore');
    }

    return app('anlutro\LaravelSettings\SettingStore')->get($key, $default);
}

function hari_ini()
{
    $hari = date("D");

    switch ($hari) {
        case 'Sun':
            $hari_ini = "Minggu";
            break;

        case 'Mon':
            $hari_ini = "Senin";
            break;

        case 'Tue':
            $hari_ini = "Selasa";
            break;

        case 'Wed':
            $hari_ini = "Rabu";
            break;

        case 'Thu':
            $hari_ini = "Kamis";
            break;

        case 'Fri':
            $hari_ini = "Jumat";
            break;

        case 'Sat':
            $hari_ini = "Sabtu";
            break;

        default:
            $hari_ini = "Tidak di ketahui";
            break;
    }

    return "<b>" . $hari_ini . "</b>";
}

function uuidv4()
{
    return collect(DB::select("SELECT uuid_generate_v4() uuid"))->first()->uuid;
}

function anti_injeksi($data = null)
{
    // 1. Konversi karakter khusus jadi entity HTML (misal < jadi &lt;)
    // 2. Hapus tag HTML/JS (strip_tags)
    // 3. Hapus karakter backslash (\)
    $filter = stripslashes(strip_tags(htmlspecialchars($data, ENT_QUOTES)));

    // 4. Bersihkan entity HTML yang mencurigakan
    $filter = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '', $filter);

    return $filter;
}


function uang($money, $titik = '.')
{
    $hasil = number_format($money, 0, "", $titik);
    return $hasil;
}

// function hasPermission($route)
// {
//     $key = 'permissions' . auth()->user()->id;

//     $permissions = Cache::remember($key, config('feestgemak.cache_minutes'), function () {
//         $collection = collect();

//         auth()->user()->load('roles.permissions');

//         foreach (auth()->user()->roles as $role) {
//             foreach ($role->permissions as $permission) {
//                 $collection->push($permission->name);
//             }
//         }

//         return $collection;
//     });

//     return $permissions->contains($route);
// }

function moneyFormat($money)
{

    return number_format($money, '2', ',', '.');
}

function persenFormat($int)
{

    return moneyFormat($int);
}

// from idr to decimal
function decimalFormat($money)
{

    return str_replace(['.', ','], [null, '.'], $money);
}


// from dd/mm/yyyy to yyyy-mm-dd
function dbDateFormat($date)
{

    list($dd, $mm, $yyyy) = explode('/', $date);

    return "$yyyy-$mm-$dd";
}


// from yyyy-mm-dd to dd/mm/yyyy
function dateFormat($date)
{

    if (is_null($date)) $date = date('Y-m-d');

    list($yyyy, $mm, $dd) = explode('-', $date);

    return "$dd/$mm/$yyyy";
}

function indoDateFormat(int $from_time = null)
{

    $hari = [
        'Ahad',
        'Senin',
        'Selasa',
        'Rabu',
        'Kamis',
        'Jumat',
        'Sabtu'
    ];

    $bulan = [
        1 => 'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    ];

    $time = is_null($from_time) ? time() : $from_time;
    list($w, $d, $m, $y, $h, $i, $s) = explode('-', date('w-d-m-Y-H-i-s', $time));

    $d = (int)$d;
    $m = (int)$m;

    return "$hari[$w], $d $bulan[$m] $y $h:$i:$s";
}

function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $hari = array(
        1 => 'Senin',
        'Selasa',
        'Rabu',
        'Kamis',
        'Jumat',
        'Sabtu',
        'Minggu'
    );
    $pecahkan = explode('-', $tanggal);
    // dd($pecahkan);

    if (count($pecahkan) == 6) {
        return  $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0] . ' ' . $pecahkan[3] . ':' . $pecahkan[4] . ':' . $pecahkan[5];
    } else if (count($pecahkan) == 3) {
        return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
    } else if (count($pecahkan) == 7) {
        return  $hari[(int)$pecahkan[6]] . ', ' . $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0] . ' ' . $pecahkan[3] . ':' . $pecahkan[4] . ':' . $pecahkan[5];
    } else if (count($pecahkan) == 2) {
        return $pecahkan[1] . ' ' . $bulan[(int)$pecahkan[0]];
    }
    // return count($pecahkan);
}
