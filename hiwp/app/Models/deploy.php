<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class deploy extends Model
{
    use HasFactory;

    protected $table = 'redeploy';

    protected $fillable =[
        'staffid',
        'surname',
        'othername',
        'gender',
        'currentrole',
        'previousfeeder',
        'currentregion',
        'currentdepartment',
        'newrole',
        'newfeeder',
        'newregion',
        'unit',
        'newdepartment',
        'effectivedeploymentdate',
        'email',
        'currentreportingline',
        'currentregionalmisemail',
        'newreportinglinerole',
        'newreportinglineemail',
        'newregionalmisemail',
        'redeploymenttype',
        'relocationallowance',
    ];
}
