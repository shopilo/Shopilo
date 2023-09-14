<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminPermission extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'admin_id',
        'permission'
    ];

    /**
     * Disable Timestamps for this model
     */
    public $timestamps = false;
    /**
     * Get the admin that owns the permission.
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
