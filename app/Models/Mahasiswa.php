<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'nilai_quis', 'nilai_tugas', 'nilai_absensi', 'nilai_praktek', 'nilai_uas'
    ];

    public function getRataRataAttribute()
    {
        return ($this->nilai_quis + $this->nilai_tugas + $this->nilai_absensi + $this->nilai_praktek + $this->nilai_uas) / 5;
    }

    public function getGradeAttribute()
    {
        $rata_rata = $this->rata_rata;

        if ($rata_rata <= 65) {
            return 'D';
        } elseif ($rata_rata <= 75) {
            return 'C';
        } elseif ($rata_rata <= 85) {
            return 'B';
        } else {
            return 'A';
        }
    }
}
