
<form action="" method="get">
    <p>
        <label for="principio">Comienzo</label>
        <input type="text" id="principio" name="principio">
    </p>

    <p>
        <label for="final">Final</label>
        <input type="text" name="final" id="final">
    </p>
    <p>
        <input type="submit">
    </p>
    
</form>

<?php
    echo "<ol>";
    for ($i=0; $i <= 50; $i++) { 
        if ($i%2==0) {
            echo "<li>$i</li>";   
        }
    }
    echo "</ol>";
?>