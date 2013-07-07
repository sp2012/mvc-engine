<hr/>
<ur><?php

         echo "<li>" . $data[0] . "</li>";

    ?></ur>
<ur><?php
    foreach($data[1] as $value)
    {
        echo "<li>" . $value . "</li>";
    }
    ?></ur>