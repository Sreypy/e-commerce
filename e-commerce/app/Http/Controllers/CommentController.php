<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Comment;
use App\Models\Author;
use App\Models\Audience;
use App\Models\Article;

class CommentController extends Controller
{
    public function createComments()
    {
        // Author Sok → Article
        $article = Article::where('name', 'Climate changes in the last 3 years')->first();
        $author = Author::where('name', 'Sok')->first();

        Comment::create([
            'name' => 'Thank you to all the subscribers',
            'user_id' => $author->user_id,
            'commentable_id' => $article->id,
            'commentable_type' => Article::class
        ]);

        // Audience Samnang → Author Sao
        $audience = Audience::where('name', 'Samnang')->first();
        $authorSao = Author::where('name', 'Sao')->first();

        Comment::create([
            'name' => 'Your article is amazing',
            'user_id' => $audience->user_id,
            'commentable_id' => $authorSao->id,
            'commentable_type' => Author::class
        ]);

        // Author Sao → Audience Samnang
        Comment::create([
            'name' => 'Welcome to read my article',
            'user_id' => $authorSao->user_id,
            'commentable_id' => $audience->id,
            'commentable_type' => Audience::class
        ]);

        // Audience Veasna → Article
        $audienceVeasna = Audience::where('name', 'Veasna')->first();
        $articleQC = Article::where('name', 'Quantum computers, is it coming?')->first();

        Comment::create([
            'name' => "I can't wait this thing happening",
            'user_id' => $audienceVeasna->user_id,
            'commentable_id' => $articleQC->id,
            'commentable_type' => Article::class
        ]);

        return response()->json(['message' => 'Comments created']);
    }
}
