<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'priority', 'due_date', 'completed', 'completed_at']; 
    
    # defines which fields can be filled also protect against unauthorized changes


}
?>