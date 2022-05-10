<?php

namespace App\Models;

class Todo extends Model
{

    use HasFactory;

    protected $table = 'todos';
    
    protected $fillable = [
        'title',
        'description',
        'done',
        'done_at'
    ];

    public function done(): void
    {
        $this->update([
            'done' => true,
            'done_at' => Carbon::now()
        ]);
    }
}