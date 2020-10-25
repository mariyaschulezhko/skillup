<?php
function printR($array) {
    $markup = '';
    foreach ($array as $key => $value) {
        $markup .= '<li>' . $key . '=>' . ((is_array($value)) ? $key . printR($value) : $value) . '</li>';
    }

    return '<ul>' . $markup . '</ul>';
}

$array =  ['new website' =>[
    'task ID' => 3254,
    'task title' => 'website for shop',
    'task description' => 'in bright colors',
    'task owner' => 'Olga',
    'task deadline' => '2 weak',
    'task status' => 'in process',
],
    'Internet marketing' =>[
        'task ID' => 55557,
        'task title' => 'sales',
        'task description' => 'social media advertising',
        'task owner' => 'Max',
        'task deadline' => '2 month',
        'task status' => 'start'
    ],
    'learn machines' => [
        'task ID' => 777773,
        'task title' => 'neuron',
        'task discriotion' => 'independent temperature measurement',
        'task owner' => 'Mariia',
        'task deadline' => '3 month',
        'task status' => 'finish',
    ],
];

echo printR($array);