<?php

namespace App\Services\Tracking;

use App\Models\Language;
use Illuminate\Http\Request;

class LanguageDetector
{
    protected $language;
    protected $agentParser;

    public function __construct(
        Language $language,
        AgentParser $agentParser
    ) {
        $this->language = $language;
        $this->agentParser = $agentParser;
    }

    public function detect(Request $request)
    {
        $agent = $this->agentParser->parse($request);
        $languages = $agent->languages();

        return $this->language->updateOrCreate([
            'preference' => $languages[0] ?? 'en',
            'range' => implode(';', $languages)
        ]);
    }
}