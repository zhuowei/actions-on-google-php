<?php
$output = [
	"conversation_token" => "42",
	"expect_user_response" => true,
	"expected_inputs" => [
		[
			"input_prompt" => [
				"initial_prompts" => [
					["text_to_speech" => "Hey I'm alive"]
				],
				"no_input_prompts" => [
					["text_to_speech" => "Say again?"]
				],
			],
			"possible_intents" => [
				["intent" => "assistant.intent.action.TEXT"]
			]
		]
	]
];
header("Google-Assistant-API-Version: v1");
header("Content-Type: application/json");
echo json_encode($output);