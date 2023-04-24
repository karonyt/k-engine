<?php
require_once('./vendor/autoload.php');
$authKeyOpenAI = "XXXXXXXXXXXXXXXXXXX";

try {
    $client = OpenAI::client($authKeyOpenAI);
    $response = $client->completions()->create([
        'model'=> isset($_POST['model']) ? $_POST['model'] : 'text-davinci-003',
        'prompt'=> isset($_POST['prompt']) ? $_POST['prompt'] : '',
        'temperature'=>isset($_POST['temperature']) ? floatval($_POST['temperature']) : 0.7,
        'max_tokens'=> isset($_POST['max_tokens']) ? intval($_POST['max_tokens']) : 1024,
        'stop'=>isset($_POST['stop']) ? $_POST['stop'] : 'None',
        'top_p'=>isset($_POST['top_p']) ? floatval($_POST['top_p']) : 1,
        'frequency_penalty'=>isset($_POST['frequency_penalty']) ? floatval($_POST['frequency_penalty']) : 0,
        'presence_penalty'=>isset($_POST['presence_penalty']) ? floatval($_POST['presence_penalty']) : 0,
    ]);
    
    $json = null;
    $json[] = array(
        'text'=> $response->choices[0]->text
    );
    
    if (isset($json['text'])) { 
        $json['text'] = '応答がありません。しばらくしてからもう一度試してみてください。';
    }
    echo json_encode($json);
    exit;
} catch (PDOException $e) {
    $json = null;
    $json[] = array(
        'text'=> 'Error:' . $e->getMessage();
    );
    echo json_encode($json);
    exit;
}
?>
