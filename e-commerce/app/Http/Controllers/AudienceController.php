<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Audience;
use App\Models\Article;

class AudienceController extends Controller
{
    //
    public function createAudiences()
    {
        $data = [
            ['name' => 'Veasna', 'user' => 'veasna'],
            ['name' => 'Samnang', 'user' => 'samnang'],
            ['name' => 'Ratana', 'user' => 'ratana'],
        ];

        foreach ($data as $item) {
            $user = User::create(['name' => $item['user']]);
            Audience::create([
                'name' => $item['name'],
                'user_id' => $user->id,
                'article_id' => 1 // temporary, updated later
            ]);
        }

        return response()->json(['message' => 'Audiences created']);
    }

    public function subscribeArticles()
    {
        $subscriptions = [
            'Samnang' => [
                'Computers in the next generation',
                'Chemistry in nature form',
                'The origin of water'
            ],
            'Veasna' => [
                'Climate changes in the last 3 years',
                'The origin of water',
                'Quantum computers, is it coming?'
            ],
            'Ratana' => [
                'Climate changes in the last 3 years',
                'Global warming is in its critical stage'
            ]
        ];
        foreach ($subscriptions as $audienceName => $titles) {
            $audienceUser = Audience::where('name', $audienceName)->first();

            foreach ($titles as $title) {
                $article = Article::where('name', $title)->first();

                Audience::create([
                    'name' => $audienceName,
                    'user_id' => $audienceUser->user_id,
                    'article_id' => $article->id
                ]);
            }
        }

    return response()->json(['message' => 'Subscriptions created']);

    }
}
