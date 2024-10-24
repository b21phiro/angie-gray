<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;

class Media extends Model
{

    use HasFactory;

    protected int $id;
    protected int $uuid;

    public string $type;
    public string $name;
    public int $size;
    public Date $upload;

}
