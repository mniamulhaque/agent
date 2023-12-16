<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class filemanage extends Model
{
    protected $fillable = [
        'fileType','fname','dob','vill','ptype','name','pyear','mobile','alterNative','agreementType','agentBy','total_price','pay_1st','pay_2nd','pay_3rd','file_documet','suspend_aproved','file_status','done_aproved','file_recipt',
    ];
}
