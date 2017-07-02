<?php

namespace App\Models\System\Index;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class RecentPromotions extends Model
{
    public $table = 'index_promotions';
    public $fillable = ['cid', 'new_text'];

    public function user() {
        return $this->hasOne(User::class, 'id', 'cid');
    }
}