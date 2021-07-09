<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificat extends Model
{

    protected $table = 'certificats';


    protected $fillable = [
        'cart_stud','pict1','pict2', 'pict3', 'logowt', 'cont_certificate', 'name_certificat',  'logoero', 'seg1' ,'seg2', 'backgrond' ,'pict4', 'pict5' ,'pict6' ,'name1','name2','name3','name4','name5','name6','student_subj' ,'namestudent'
    ];
    public $timestamps = false;

}
