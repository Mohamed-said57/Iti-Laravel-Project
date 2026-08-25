<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChatbotMessageRequest;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;

class ChatbotController extends Controller
{
    public function index()
    {
        return view('chatbot.index');
    }

    public function chat(ChatbotMessageRequest $request)
    {
        $validated = $request->validated();

        $message = $validated['message'];
        $conversation = $validated['conversation'] ?? [];

        $apiKey = config('services.gemini.key');
        $model = config('services.gemini.model');

        try {
            $response = Http::timeout(30)
                ->connectTimeout(10)
                ->retry(2, 500)
                ->withHeaders([
                    'Content-Type' => 'application/json',
                    'x-goog-api-key' => $apiKey,
                ])
                ->post(
                    "https://generativelanguage.googleapis.com/v1beta/models/{$model}:generateContent",
                    [
                        'contents' => collect($conversation)
                            ->map(function ($item) {
                                return [
                                    'role' => $item['role'] === 'assistant' ? 'model' : 'user',
                                    'parts' => [
                                        [
                                            'text' => $item['text'],
                                        ],
                                    ],
                                ];
                            })
                            ->push([
                                'role' => 'user',
                                'parts' => [
                                    [
                                        'text' => $message,
                                    ],
                                ],
                            ])
                            ->values()
                            ->all(),
                    ]
                );

            if ($response->failed()) {
                return response()->json([
                    'message' => $response->body(),
                ], $response->status());
            }

            $reply = $response->json('candidates.0.content.parts.0.text');

            return response()->json([
                'reply' => $reply,
            ]);
        } catch (ConnectionException | RequestException) {
            return response()->json([
                'message' => 'Unable to contact the AI service.',
            ], 500);
        }
    }
}
