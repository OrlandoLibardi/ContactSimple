<?php

namespace OrlandoLibardi\ContactCms\app;

use Illuminate\Database\Eloquent\Model;
use Log;

class Contact extends Model
{
    protected $fillable = [ 'name', 'email', 'subject', 'phone', 'ip_address', 'message', 'extra_content', 'status'];

    /**
     * Date updated_at Accessor
     */   
    public function getUpdatedAtAttribute($value)
    {
        if($value) return \Carbon\Carbon::parse($value)->format('d/m/Y H:i:s');
    }
    /**
     * Date created_at Accessor
     */   
    public function getCreatedAtAttribute($value)
    {
        if($value) return \Carbon\Carbon::parse($value)->format('d/m/Y H:i:s');
    }
}