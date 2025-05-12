<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Statistic;
use App\Models\InterestPlace;
use App\Models\Chat;
use App\Models\Community;
use App\Models\Group;
use App\Models\Message;
use App\Models\Personalization;
use App\Models\Route;


class OrmControllers extends Controller
{
         public function consultas()
    {
        // 1 usuario-estadisticas

        //$users = User::find(1);
        //return $users->statistics;
        //return $Users;  


        //2  usuario-perfiles

        //$users = User::find(1);
        //return $users->profile;
        //return $Users;  


        //3 chats-usuarios

         //$chats = Chat::find(1);
        //return $chats->User;
        //return $chats;  


        //4 comunidades-grupos

        //$communities = Community::find(1);
        //return $communities->groups;
        //return $communities;  



        //5 mensajes-chats

        // $messages = Message::find(1);
        //return $messages->Chat;
        //return $messages;  

    }
}
