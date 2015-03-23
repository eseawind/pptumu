<?php
echo '"'. implode('","', $fields) . '"' . "\n";
foreach($rows as $row)
{
    echo '"';
    foreach($fields as $fieldName => $fieldLabel)
    {
        isset($row->$fieldName) ? print(strip_tags($row->$fieldName)) : print('');
        echo '","';
    }
    echo '"' . "\n";
}
