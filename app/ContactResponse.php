<?php

namespace OrlandoLibardi\ContactCms\app;

use Illuminate\Database\Eloquent\Model;


class ContactResponse extends Model
{
    protected $fillable = [ 'content_title', 'content', 'content_type', 'reply_name', 'reply_email', 'cc'];

    /**
     * cc Accessor
     */
    public function getCcAttribute($value)
    {
        if($value) return json_decode($value);
    }
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