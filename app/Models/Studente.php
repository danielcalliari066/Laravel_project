<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Studente extends Model
{
    protected $table = 'alunni2004'; // tell Laravel the correct table

    protected $primaryKey = 'ID';    // your PK is 'ID', not 'id'
    public $incrementing = false;
    protected $keyType = 'string';   // since 'ID' is varchar(50)
    public $timestamps = false;
    protected $fillable = [
        'ID', 'Specializzazione', 'Anno', 'Sezione',
        'Cognome', 'Nome', 'Residenza', 'DataNascita', 'Foto'
    ];
}
