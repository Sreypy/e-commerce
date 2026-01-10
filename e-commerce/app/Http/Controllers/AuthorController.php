<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Author;

class AuthorController extends Controller
{
    //
    public function createAuthors()
    {
        $data = [
            ['author' => 'Sok',  'user' => 'sok123'],
            ['author' => 'Sao',  'user' => 'sao'],
            ['author' => 'Dara', 'user' => 'd.dara'],
        ];

        foreach ($data as $item) {
            // $user = User::create(['name' => $item['user']]);
            $user = User::create([
                'name' => $item['user'],
                'email' => $item['user'].'@example.com',
                'password' => Hash::make('password')
            ]);
            Author::create([
                'name' => $item['author'],
                'user_id' => $user->id
            ]);
        }

        return response()->json(['message' => 'Authors created']);
    }
}
