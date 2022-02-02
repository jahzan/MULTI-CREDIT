<?php
if(env('MESSAGEBIRD_DEBUG')){
    return [
        'key'   =>env('MESSAGEBIRD_TEST_KEY'),
        'id'    =>env('MESSAGEBIRD_TEST_ID'),
    ];
}
else{
    return [
        'key'   =>env('MESSAGEBIRD_KEY'),
        'id'    =>env('MESSAGEBIRD_ID'),
    ];
}