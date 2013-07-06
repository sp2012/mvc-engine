<hr/>
<h1><?php echo $data[0]; ?></h1>
<h2><?php echo $data[2]; ?></h2>
<br/>
<b><?php echo $data[1]; ?></b>
<br/>
<ur><?php
    foreach($data[3] as $value)
    {
        echo "<li>" . $value . "</li>";
    }
    ?></ur>
<ur><?php
    foreach($data[4] as $value)
    {
        echo "<li>" . $value . "</li>";
    }
    ?></ur>