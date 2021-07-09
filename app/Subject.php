<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'description', 'is_active', 'major_id', 'user_id', 'semester', 'academic_year_id'];

    public function major()
    {
        return $this->belongsTo('App\Major');
    }

    public function teachers()
    {
        return $this->belongsToMany('App\Teacher');
    }

    public function students(){
        return $this->belongsToMany("App\Student");
    }

    public function lectures()
    {
        return $this->hasMany('App\Lecture');
    }

    public function academicYear()
    {
        return $this->belongsTo('App\AcademicYear');
    }

    public function getSemesterAttribute($value)
    {
        return $value === 1 ? 'الفصل الأول' : 'الفصل الثاني';
    }

    public function subjectDate(){
        return $this->hasOne("App\SubjectDate");
    }
}
 