<?php
declare(strict_types=1);

function sendHeaders() {
	header("Google-Assistant-API-Version: v1");
	header("Content-Type: application/json");
}

function textOrSsml(bool $isSsml, string $theStr) : array {
	return [($isSsml? "ssml" : "text_to_speech") => $theStr];
}

function buildInputPrompt(bool $isSsml, string $initialPrompt, array $noInputs) : array {
	return
		[
			"initial_prompts" => [
				textOrSsml($isSsml, $initialPrompt)
			],
			"no_input_prompts" => array_map(function($a) use ($isSsml) {
				return textOrSsml($isSsml, $a);
			}, $noInputs)
		];
}

function ask(array $inputPrompt, $dialogState) {
	$output = [
		"conversation_token" => $dialogState,
		"expect_user_response" => true,
		"expected_inputs" => [
			[
				"input_prompt" => $inputPrompt,
				"possible_intents" => [
					["intent" => "assistant.intent.action.TEXT"]
				]
			]
		]
	];
	sendHeaders();
	echo json_encode($output);
}