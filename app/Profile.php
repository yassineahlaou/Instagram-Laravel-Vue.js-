<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    public function profileImage(){
        $imagePath =  ($this->image) ? $this->image :  'uploads/STbJByrEQsgjd9wVpjQRunxkCr0J4C8K7FaFFlVf.jpeg';
        return '/storage/' . $imagePath;

        //default profile image when creating account

    }
    public function followers(){
        return $this->belongsToMany(User::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }


}
