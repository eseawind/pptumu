<?php echo "<?xml version='1.0' encoding='utf-8'?><xml>\n";?>
<fields>
<?php
foreach($fields as $fieldName => $fieldLabel)
{
  echo "  <$fieldName>$fieldLabel</$fieldName>\n";
}
?>
</fields>
<rows>
<?php
foreach($rows as $row)
{
    echo "  <row>\n";
    foreach($fields as $fieldName => $fieldLabel)
    {
        $fieldValue = isset($row->$fieldName) ? htmlspecialchars($row->$fieldName) : '';
        echo "    <$fieldName>$fieldValue</$fieldName>\n";
    }
    echo "  </row>\n";
}
?>
</rows>
</xml>
