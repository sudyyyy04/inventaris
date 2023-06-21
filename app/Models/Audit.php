<?php

namespace App\Models;

use OwenIt\Auditing\Models\Audit as ModelsAudit;

class Audit extends ModelsAudit
{
    protected $table = 'audits';
    protected $primarykey = 'id';
}
