<?php

namespace App;

use App\Http\Traits\ModelBasicTrait;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use ModelBasicTrait;

    /**
     * Массив с данными сообщений, которые будем сохранять в таблицу
     *
     * @var array
     */
    protected $fillable =['name', 'email', 'phone', 'message', 'status'];


    /**
     * @return int
     */
    public static function countNewMessages()
    {
        return Message::all()->where('status', '=', '0')->count();
    }

    /**
     * @throws \Exception
     */
    public function remove()
    {
        $this->delete();
    }
}
