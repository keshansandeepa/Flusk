<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{
    protected $fillable= ['name','contact_no','sister_name','hospital_id','ward_types'];

    public function hospital()
    {
        return $this->belongsTo(Hospital::class);
    }
    public function ward()
    {
        return $this->hasOne(Sample::class);
    }

}
