<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;

class ChatbotController extends BaseController
{
    use ResponseTrait;

    private $geminiApiKey;
    private $geminiApiUrl = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-flash-latest:generateContent';

    public function __construct()
    {
        $this->geminiApiKey = getenv('GEMINI_API_KEY');
    }

    /**
     * Send message to Gemini and get response
     */
    public function sendMessage()
    {
        // if ($this->request->getMethod() !== 'post') {
        //     return $this->fail('POST method required', 405);
        // }

        $input = json_decode($this->request->getBody(), true);
        $userMessage = $input['message'] ?? '';

        if (empty($userMessage)) {
            return $this->fail('Message cannot be empty', 400);
        }

        // Sanitize input
        $userMessage = htmlspecialchars(trim($userMessage), ENT_QUOTES, 'UTF-8');

        try {
            // Prepare the request payload
            $payload = [
                'contents' => [
                    [
                        'parts' => [
                            [
                                'text' => $this->buildSystemPrompt() . "\n\nUser: " . $userMessage
                            ]
                        ]
                    ]
                ],
                'generationConfig' => [
                    'temperature' => 0.7,
                    'topP' => 0.9,
                    'topK' => 50,
                    'maxOutputTokens' => 1024,
                ]
            ];

            // Call Gemini API
            $client = \Config\Services::curlRequest();
            $response = $client->request('POST', $this->geminiApiUrl, [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'query' => [
                    'key' => $this->geminiApiKey
                ],
                'json' => $payload,
                'timeout' => 30
            ]);

            $statusCode = $response->getStatusCode();

            if ($statusCode !== 200) {
                log_message('error', 'Gemini API Error: ' . $response->getBody());
                return $this->fail('Failed to get response from AI', 500);
            }

            $result = json_decode($response->getBody());

            // Extract the text from response
            if (isset($result->candidates[0]->content->parts[0]->text)) {
                $botMessage = $result->candidates[0]->content->parts[0]->text;
                return $this->respond([
                    'success' => true,
                    'message' => $botMessage
                ]);
            }

            return $this->fail('Unexpected response format from AI', 500);
        } catch (\Exception $e) {
            log_message('error', 'Chatbot Error: ' . $e->getMessage());
            return $this->fail('An error occurred while processing your message', 500);
        }
    }

    /**
     * Build system prompt for Gemini
     */
    private function buildSystemPrompt(): string
    {
        return "Anda adalah asisten chatbot untuk Coga Barbershop, sebuah barbershop premium di Indonesia. 
Berikut informasi tentang toko kami:

NAMA: Coga Barbershop
TENTANG: Kami adalah barbershop premium yang menyediakan layanan cukur profesional dengan barber berpengalaman.

LAYANAN KAMI:
- Cutting & Shave: Rp 50.000
- Hair Wash: Rp 25.000
- Beard Trim: Rp 30.000
- Massage: Rp 40.000

JAM OPERASIONAL:
- Senin - Jumat: 10:00 - 18:00
- Sabtu - Minggu: 10:00 - 18:00

LOKASI:
304 North Cardinal St, Dorchester Center, MA 02124

KONTAK:
- Email: info@company.com
- Phone: (+63) 555 1212

Instruksi:
1. Jawab pertanyaan pelanggan tentang layanan, harga, jam operasional, dan lokasi dengan ramah
2. Gunakan bahasa Indonesia
3. Jika ditanyakan tentang booking, berikan panduan singkat dan sarankan untuk menggunakan tombol 'Book Appointment'
4. Jika pertanyaan di luar topik barbershop, tetap profesional dan arahkan kembali ke layanan kami
5. Selalu sopan, ramah, dan membantu
6. Respond singkat saja
";
    }
}
