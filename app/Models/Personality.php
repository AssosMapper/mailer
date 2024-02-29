<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personality extends Model
{
    /*            $table->id();
            $table->string('full_name');
            $table->string('profession');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('additionalPhone')->nullable();
            $table->string("fax")->nullable();
            $table->string("additionalFax")->nullable();
            $table->string('full_address')->nullable();
            $table->string('additionalAddress')->nullable();
            $table->string('departmentName')->nullable();
            $table->string('departmentNumber')->nullable();
            $table->string('party')->nullable();
            $table->integer('constituency')->nullable();
            $table->json('urls')->nullable();
            $table->timestamps();
    */
    protected $fillable = [
        'full_name',
        'profession',
        'email',
        'phone',
        'additionalPhone',
        'fax',
        'additionalFax',
        'full_address',
        'additionalAddress',
        'departmentName',
        'departmentNumber',
        'party',
        'constituency',
        'urls',
    ];
}
