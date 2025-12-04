<?php

namespace App\Models;

use config\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reserva extends Model
{
    protected $fillable = ['fecha', 'hora', 'sala_id', 'user_id', 'numpersonas', 'estado','telefono'];
    /**
     * @return BelongsTo me devuelve el sala que pertenece a esa la reserva
     */
    public function sala():BelongsTo
    {
        return $this->belongsTo(Sala::class);
    }

    /**
     * @return BelongsTo me devuelve el usuario que ha heco la reserva
     */
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }


}
