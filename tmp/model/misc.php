<?php
helper::import('/var/apache/htdocs/zentaopms.lo/module/misc/model.php');
class extmiscModel extends miscModel 
{
public function hello2()
{
echo 'start from hello2.start.php<br>';
    echo $this->loadExtension('test')->hello();    // Load testMisc class from test.class.php in ext/model/class.
    return $this->testMisc->hello();               // After loading, can use $this->testMisc to call it.
}
public function foo()
{
    return 'foo';
}
    public function hello()
    {
echo 'start from hellp.test2.php<br>';
echo "start from hello.test.php <br>";
        return 'hello world from hello()<br />';
    }

//**//
}